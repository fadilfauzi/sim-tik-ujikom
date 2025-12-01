<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetRequestController extends Controller
{
    public function index()
    {
        $requests = AssetRequest::with(['category', 'user'])
            ->latest()
            ->paginate(10);
            
        return view('admin.asset-requests.index', compact('requests'));
    }

    public function show(AssetRequest $assetRequest)
    {
        return view('admin.asset-requests.show', compact('assetRequest'));
    }

    public function approve(Request $request, AssetRequest $assetRequest)
    {
        if ($assetRequest->status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan ini sudah diproses.');
        }

        // Update status pengajuan
        $assetRequest->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        // Buat aset baru dari pengajuan yang disetujui
        Asset::create([
            'name' => $assetRequest->name,
            'asset_tag' => $assetRequest->asset_tag,
            'category_id' => $assetRequest->category_id,
            'status' => 'available',
            'purchase_date' => now(),
        ]);

        return redirect()->route('admin.asset-requests.index')
            ->with('success', 'Pengajuan aset disetujui dan aset telah dibuat.');
    }

    public function reject(Request $request, AssetRequest $assetRequest)
    {
        $request->validate([
            'rejection_reason' => 'required|min:5',
        ]);

        if ($assetRequest->status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan ini sudah diproses.');
        }

        $assetRequest->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
            'rejection_reason' => $request->rejection_reason,
        ]);

        return redirect()->route('admin.asset-requests.index')
            ->with('success', 'Pengajuan aset ditolak.');
    }
}
