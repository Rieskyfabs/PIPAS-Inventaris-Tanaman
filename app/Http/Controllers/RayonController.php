<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Rayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RayonController extends Controller
{
    public function index()
    {
        $rayons = Rayon::orderBy('created_at', 'desc')
        ->get()
        ->map(function ($item, $key) {
            // Menambahkan iteration (nomor urut)
            $item->iteration = $key + 1;

            // Menambahkan render untuk kolom created_at
            $item->created_at_column = $item->created_at->format('d-m-Y H:i');

            // Menambahkan render untuk kolom actions
            $item->actions_buttons_column = view('components.atoms.table.action-buttons-column', [
                'editModalTarget' => '#EditRayons' . $item->id,
                'deleteRoute' => route('rayon.destroy', $item->id),
            ])->render();

            $item->subtext = $item->description;

            return $item;
        });

        $title = 'Apakah anda yakin?';
        $text = "semua data siswa dengan rayon ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.rayons.index', compact('rayons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:rayons,name',
        ]);

        Rayon::create(['name' => $request->name]);

        ActivityLogger::log('create', 'Menambahkan data rayon baru dengan nama: ' . $request->name);

        Alert::success('Data Ditambahkan', 'Berhasil menambahkan data rayon!');

        return redirect()->route('rayon');
    }

    public function edit($id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('admin.pages.rayons.edit', compact('rayon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:rayons,name,' . $id,
        ]);

        $rayon = Rayon::findOrFail($id);
        $rayon->update(['name' => $request->name]);

        ActivityLogger::log('update', 'Memperbarui data rayon dengan nama: ' . $request->name);

        Alert::success('Data DiUpdate', 'Berhasil memperbarui data rayon!');

        return redirect()->route('rayon');
    }

    public function destroy($id)
    {
        // Cek apakah rayon masih digunakan di tabel lain, misalnya tabel students
        $isUsed = DB::table('students')->where('rayon_id', $id)->exists();

        if ($isUsed) {
            // Tampilkan pesan error jika rayon masih digunakan
            Alert::error('Gagal menghapus rayon', 'Rayon ini masih digunakan oleh data siswa.');
            return redirect()->route('rayon');
        }

        // Jika tidak digunakan, lanjutkan penghapusan
        $rayon = Rayon::findOrFail($id);
        $rayon->delete();

        // Mencatat aktivitas
        ActivityLogger::log('delete', 'Menghapus data rayon dengan ID: ' . $id);

        // Tampilkan pesan sukses
        Alert::success('Hapus data rayon', 'Berhasil menghapus data rayon.');

        return redirect()->route('rayon');
    }

}
