<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Category;
use Illuminate\Http\Request;
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
        ActivityLogger::log('create', 'Created a new categories with name: ' . $request->name);

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
        ActivityLogger::log('update', 'Updated a categories data with name: ' . $request->name);

        // Tampilkan pesan sukses
        Alert::success('Data DiUpdate', 'Berhasil mengupdate data kategori!');

        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Mencatat aktivitas
        ActivityLogger::log('delete', 'Deleted a categories data with ID: ' . $id);

        // Tampilkan pesan sukses
        Alert::success('Hapus data kategori', 'Berhasil menghapus data kategori');

        return redirect()->back();
    }
}
