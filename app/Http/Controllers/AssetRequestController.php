<?php

namespace App\Http\Controllers;

use App\Models\AssetRequest;
use App\Models\Category;
use App\Models\Asset;
use Illuminate\Http\Request;

class AssetRequestController extends Controller
{
    public function index()
    {
        $requests = AssetRequest::with(['category', 'user'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
            
        return view('asset-requests.index', compact('requests'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('asset-requests.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'asset_tag' => 'required|unique:asset_requests',
            'category_id' => 'required|exists:categories,id',
            'reason' => 'required|min:10',
            'notes' => 'nullable',
        ]);

        $validatedData['user_id'] = auth()->id();
        $validatedData['status'] = 'pending';

        AssetRequest::create($validatedData);

        return redirect()->route('asset-requests.index')
            ->with('success', 'Pengajuan aset berhasil dikirim. Menunggu persetujuan admin.');
    }

    public function show(AssetRequest $assetRequest)
    {
        if ($assetRequest->user_id !== auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403);
        }

        return view('asset-requests.show', compact('assetRequest'));
    }
}
