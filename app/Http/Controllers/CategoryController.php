<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();

        $title = 'Apakah anda yakin?';
        $text = "semua data tanaman dengan kategori ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        // Mencatat aktivitas
        ActivityLogger::log('create', 'Menambahkan data kategori baru dengan nama: ' . $request->name);

        // Tampilkan pesan sukses
        Alert::success('Data Ditambahkan', 'Berhasil menambahkan data kategori!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        // Mencatat aktivitas
        ActivityLogger::log('update', 'Memperbarui data kategori dengan nama: ' . $request->name);

        // Tampilkan pesan sukses
        Alert::success('Data DiUpdate', 'Berhasil memperbarui data kategori!');

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        // Cek apakah kategori masih digunakan di tabel lain
        $isUsed = DB::table('plant_attributes')->where('category_id', $id)->exists();

        if ($isUsed) {
            // Tampilkan pesan error jika kategori masih digunakan
            Alert::error('Gagal menghapus kategori', 'Kategori ini masih digunakan oleh data lain');
            return redirect()->back();
        }

        // Jika kategori tidak digunakan, hapus data
        $category = Category::findOrFail($id);
        $category->delete();

        // Mencatat aktivitas
        ActivityLogger::log('delete', 'Menghapus data kategori dengan ID: ' . $id);

        // Tampilkan pesan sukses
        Alert::success('Hapus data kategori', 'Berhasil menghapus data kategori');

        return redirect()->back();
    }

}
