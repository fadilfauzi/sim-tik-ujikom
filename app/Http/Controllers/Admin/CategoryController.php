<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $categories = Category::withCount('assets')->latest()->paginate(10);
        return view('admin.categories.index_new', compact('categories'));
    }

    /**
     * Menampilkan formulir untuk membuat kategori baru.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);
        
        Category::create($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori aset berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit kategori.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Memperbarui kategori di database.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:100',
        ]);
        
        $category->update($validatedData);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori aset berhasil diperbarui.');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(Category $category)
    {
        // PENTING: Cek apakah ada aset yang menggunakan kategori ini sebelum dihapus
        if ($category->assets()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Tidak dapat menghapus kategori karena masih digunakan oleh aset.');
        }
        
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori aset berhasil dihapus.');
    }
}