<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Category;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua aset DENGAN relasinya (category dan technician)
        $assets = Asset::with(['category'])->paginate(10); 
        return view('admin.assets.index_new', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->get('category_id');
        return view('admin.assets.create', compact('categories', 'selectedCategoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data (PENTING untuk UKK!)
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'asset_tag' => 'required|unique:assets',
            'category_id' => 'required|exists:categories,id', // Cek relasi kategori
            'status' => 'required',
            'purchase_date' => 'nullable|date',
        ]);
        
        Asset::create($validatedData);
        return redirect()->route('admin.assets.index')->with('success', 'Aset berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return view('admin.assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $categories = Category::all();
        return view('admin.assets.edit', compact('asset', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'asset_tag' => 'required|unique:assets,asset_tag,' . $asset->id,
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
            'purchase_date' => 'nullable|date',
        ]);

        $asset->update($validatedData);
        return redirect()->route('admin.assets.index')->with('success', 'Aset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('admin.assets.index')->with('success', 'Aset berhasil dihapus.');
    }
}
