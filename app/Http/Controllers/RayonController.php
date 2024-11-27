<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Rayon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RayonController extends Controller
{
    public function index()
    {
        $rayons = Rayon::orderBy('created_at', 'desc')->get();

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
        $rayon = Rayon::findOrFail($id);
        $rayon->delete();

        ActivityLogger::log('delete', 'Menghapus data rayon dengan ID: ' . $id);

        Alert::success('Hapus data rayon', 'Berhasil menghapus data rayon');

        return redirect()->route('rayon');
    }
}
