<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();

            if ($user->role === 'admin') {
                $tickets = Ticket::with(['reporter', 'technician'])->latest()->get();
            } elseif ($user->role === 'technician') {
                $tickets = Ticket::where('technician_id', $user->id)
                                 ->orWhereNull('technician_id')
                                 ->with(['reporter', 'technician'])->latest()->get();
            } else {
                $tickets = Ticket::where('reporter_id', $user->id)->with(['reporter'])->latest()->get();
            }
            
            return view('ticket.index', compact('tickets', 'user'));
        } catch (\Exception $e) {
            \Log::error("Error in TicketController::index(): " . $e->getMessage());
            
            return view('errors.ticket', [
                'message' => 'Terjadi kesalahan saat memuat tiket. Silakan coba lagi.',
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'user') {
            abort(403, 'Hanya user yang dapat membuat laporan.');
        }

        $assets = Asset::with('category')->orderBy('asset_tag')->get();

        return view('ticket.create', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Hanya role 'user' yang boleh buat laporan
        if (auth()->user()->role !== 'user') {
            abort(403, 'Hanya user yang dapat membuat laporan.');
        }

        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:Low,Medium,High',
            'category_id' => 'required|exists:categories,id',
            'asset_id' => 'nullable|exists:assets,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB
        ]);

        $validatedData['reporter_id'] = auth()->id();
        $validatedData['status'] = 'Pending';

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('tickets', $filename, 'public');
            $validatedData['image'] = $path;
        }

        Ticket::create($validatedData);

        return redirect()->route('tickets.index')->with('success', 'Laporan tiket berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $technicians = \App\Models\User::where('role', 'technician')->get();
        return view('ticket.show', compact('ticket', 'technicians'));
    }

    /**
     * Update ticket status (untuk admin/technician).
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Pending,Processing,Resolved,Closed',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        // Auto-assign ke teknisi paling longgar jika admin menyetujui dan belum ada teknisi_id
        if (auth()->user()->role === 'admin' && $validatedData['status'] === 'Processing' && empty($validatedData['technician_id'])) {
            $validatedData['technician_id'] = $this->getLeastBusyTechnician();
        }

        $ticket->update($validatedData);

        // Notifikasi ke teknisi jika ditugaskan
        if (isset($validatedData['technician_id']) && $validatedData['technician_id'] != $ticket->getOriginal('technician_id')) {
            $technician = User::find($validatedData['technician_id']);
            if ($technician) {
                // Notifikasi via session flash (bisa dikembangkan ke notifikasi DB)
                session()->flash('info', "Tiket #{$ticket->id} telah ditugaskan ke {$technician->name}.");
            }
        }

        return redirect()->route('tickets.show', $ticket)->with('success', 'Status tiket berhasil diperbarui.');
    }

    /**
     * Pilih teknisi dengan jumlah tiket aktif (Pending/Processing) paling sedikit.
     */
    private function getLeastBusyTechnician()
    {
        // Ambil semua user dengan role 'technician'
        $technicians = User::where('role', 'technician')->get();

        if ($technicians->isEmpty()) {
            return null;
        }

        // Hitung jumlah tiket aktif per teknisi
        $loadPerTechnician = [];
        foreach ($technicians as $tech) {
            $activeCount = Ticket::where('technician_id', $tech->id)
                ->whereIn('status', ['Pending', 'Processing'])
                ->count();
            $loadPerTechnician[$tech->id] = $activeCount;
        }

        // Pilih teknisi dengan load paling sedikit
        $bestTechnicianId = array_keys($loadPerTechnician, min($loadPerTechnician))[0];

        return $bestTechnicianId;
    }
}

