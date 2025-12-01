<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetRequest;
use App\Models\Category;
use App\Models\Division;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard based on user role
     */
    public function index()
    {
        $user = auth()->user();
        $role = $user->role;

        // Admin Dashboard
        if ($role === 'admin') {
            $totalAsets = Asset::count();
            $totalTiket = Ticket::count();
            $pendingTiket = Ticket::where('status', 'Pending')->count();
            $processingTiket = Ticket::where('status', 'Processing')->count();
            $doneTiket = Ticket::where('status', 'Done')->count();
            $totalTeknisi = User::where('role', 'technician')->count();

            return view('admin.dashboard_new', compact(
                'totalAsets',
                'totalTiket',
                'pendingTiket',
                'processingTiket',
                'doneTiket',
                'totalTeknisi'
            ));
        }

        // User Dashboard
        if ($role === 'user') {
            $totalLaporan = Ticket::where('reporter_id', $user->id)->count();
            $pendingLaporan = Ticket::where('reporter_id', $user->id)->where('status', 'Pending')->count();
            $processingLaporan = Ticket::where('reporter_id', $user->id)->where('status', 'Processing')->count();
            $doneLaporan = Ticket::where('reporter_id', $user->id)->where('status', 'Done')->count();
            
            // Get asset requests for this user
            $totalPengajuanAset = \App\Models\AssetRequest::where('user_id', $user->id)->count();

            return view('user.dashboard_new', compact(
                'totalLaporan',
                'pendingLaporan',
                'processingLaporan',
                'doneLaporan',
                'totalPengajuanAset'
            ));
        }

        // Technician Dashboard
        if ($role === 'technician') {
            $totalTugas = Ticket::where('technician_id', $user->id)->orWhereNull('technician_id')->count();
            $pendingTugas = Ticket::where('status', 'Pending')
                ->where(function ($query) use ($user) {
                    $query->where('technician_id', $user->id)->orWhereNull('technician_id');
                })
                ->count();
            $processingTugas = Ticket::where('status', 'Processing')
                ->where('technician_id', $user->id)
                ->count();
            $doneTugas = Ticket::where('status', 'Done')
                ->where('technician_id', $user->id)
                ->count();

            return view('technician.dashboard_new', compact(
                'totalTugas',
                'pendingTugas',
                'processingTugas',
                'doneTugas'
            ));
        }

        // Fallback
        return view('welcome');
    }
}
