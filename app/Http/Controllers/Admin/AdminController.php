<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Ticket;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Menampilkan dashboard admin dengan statistik.
     */
    public function index()
    {
        // Ambil data statistik penting
        $stats = [
            'total_assets' => Asset::count(),
            'total_tickets' => Ticket::count(),
            'pending_tickets' => Ticket::where('status', 'Pending')->count(),
            'processing_tickets' => Ticket::where('status', 'Processing')->count(),
            'resolved_tickets' => Ticket::where('status', 'Done')->count(),
            'total_technicians' => User::where('role', 'technician')->count(),
            'total_users' => User::where('role', 'user')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}