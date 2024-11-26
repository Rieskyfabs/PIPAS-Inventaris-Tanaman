<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Rombel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RombelController extends Controller
{
    public function index()
    {
        $rombels = Rombel::orderBy('created_at', 'desc')->get();

        $title = 'Apakah anda yakin?';
        $text = "semua data siswa dengan rombel ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.rombels.index', compact('rombels'));
    }

    public function create()
    {
        return view('admin.pages.rombels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:rombels,name',
        ]);

        Rombel::create(['name' => $request->name]);

        ActivityLogger::log('create', 'Menambahkan data rombel baru dengan nama: ' . $request->name);

        Alert::success('Data Ditambahkan', 'Berhasil menambahkan data rombel!');

        return redirect()->route('rombel');
    }

    public function edit($id)
    {
        $rombel = Rombel::findOrFail($id);
        return view('admin.pages.rombels.edit', compact('rombel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:rombels,name,' . $id,
        ]);

        $rombel = Rombel::findOrFail($id);
        $rombel->update(['name' => $request->name]);

        ActivityLogger::log('update', 'Memperbarui data rombel dengan nama: ' . $request->name);

        Alert::success('Data DiUpdate', 'Berhasil memperbarui data rombel!');

        return redirect()->route('rombel');
    }

    public function destroy($id)
    {
        $rombel = Rombel::findOrFail($id);
        $rombel->delete();

        ActivityLogger::log('delete', 'Menghapus data rombel dengan ID: ' . $id);

        Alert::success('Hapus data rombel', 'Berhasil menghapus data rombel');

        return redirect()->route('rombel');
    }
}
