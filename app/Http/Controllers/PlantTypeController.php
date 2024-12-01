<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\TipeTanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PlantTypeController extends Controller
{
    public function index()
    {
        $plantTypes = TipeTanaman::orderBy('created_at', 'desc')
        ->get()
        ->map(function ($item, $key) {
            // Menambahkan iteration (nomor urut)
            $item->iteration = $key + 1;

            // Menambahkan render untuk kolom created_at
            $item->created_at_column = $item->created_at->format('d-m-Y H:i');

            // Menambahkan render untuk kolom actions
            $item->actions_buttons_column = view('components.atoms.table.action-buttons-column', [
                'editModalTarget' => '#EditPlantTypes' . $item->id,
                'deleteRoute' => route('plantTypes.destroy', $item->id),
            ])->render();

            $item->subtext = $item->description;

            return $item;
        });

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
        // Cek apakah tipe tanaman masih digunakan di tabel plants
        $isUsed = DB::table('plant_attributes')->where('type_id', $id)->exists();

        if ($isUsed) {
            // Tampilkan pesan error jika tipe tanaman masih digunakan
            Alert::error('Gagal menghapus tipe tanaman', 'Tipe tanaman ini masih digunakan oleh data lain');
            return redirect()->back();
        }

        // Jika tipe tanaman tidak digunakan, lanjutkan penghapusan
        $plantType = TipeTanaman::findOrFail($id);
        $plantType->delete();

        // Mencatat aktivitas
        ActivityLogger::log('delete', 'Menghapus data tipe tanaman dengan ID: ' . $id);

        // Tampilkan pesan sukses
        Alert::success('Hapus data tipe tanaman', 'Berhasil menghapus data tipe tanaman');

        return redirect()->back();
    }

}
