<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\TipeTanaman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlantTypeController extends Controller
{
    public function index()
    {
        $plantTypes = TipeTanaman::orderBy('created_at', 'desc')->get();

        $title = 'Apakah anda yakin?';
        $text = "semua data tanaman dengan tipe ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.plantTypes.index', compact('plantTypes'));
    }

    public function create()
    {
        return view('admin.pages.plantTypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tipe_tanaman',
            'description' => 'nullable|string',
            // Tambahkan validasi lain jika diperlukan
        ]);

        TipeTanaman::create($request->all());

        // Mencatat aktivitas
        ActivityLogger::log('create', 'Menambahkan data tipe tanaman baru dengan nama: ' . $request->name);

        // Tampilkan pesan sukses
        Alert::success('Data Ditambahkan', 'Berhasil menambahkan data tipe tanaman!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $plantType = TipeTanaman::findOrFail($id);
        return view('admin.pages.plantTypes.edit', compact('plantType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tipe_tanaman,name,' . $id,
            'description' => 'nullable|string',
            // Tambahkan validasi lain jika diperlukan
        ]);

        $plantType = TipeTanaman::findOrFail($id);
        $plantType->update($request->all());

        // Mencatat aktivitas
        ActivityLogger::log('update', 'Memperbarui data tipe tanaman dengan nama: ' . $request->name);

        // Tampilkan pesan sukses
        Alert::success('Data DiUpdate', 'Berhasil memperbarui data tipe tanaman!');

        return redirect()->route('plantTypes');
    }

    public function destroy($id)
    {
        $plantType = TipeTanaman::findOrFail($id);
        $plantType->delete();

        // Mencatat aktivitas
        ActivityLogger::log('delete', 'Menghapus data tipe tanaman dengan ID: ' . $id);

        // Tampilkan pesan sukses
        Alert::success('Hapus data tipe tanaman', 'Berhasil menghapus data tipe tanaman');

        return redirect()->back();
    }
}
