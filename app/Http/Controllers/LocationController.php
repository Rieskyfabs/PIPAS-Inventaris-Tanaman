<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::orderBy('created_at', 'desc')
        ->get()
        ->map(function ($item, $key) {
            // Menambahkan iteration (nomor urut)
            $item->iteration = $key + 1;

            // Menambahkan render untuk kolom created_at
            $item->created_at_column = $item->created_at->format('d-m-Y H:i');

            // Menambahkan render untuk kolom actions
            $item->actions_buttons_column = view('components.atoms.table.action-buttons-column', [
                'editModalTarget' => '#EditLocation' . $item->id,
                'deleteRoute' => route('locations.destroy', $item->id),
            ])->render();

            $item->subtext = $item->description;

            return $item;
        });

        $title = 'Apakah anda yakin ingin menghapus lokasi ini?';
        $text = "Semua data tanaman dengan lokasi ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.pages.locations.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:locations',
            ]);

            Location::create($request->all());

            Alert::success('Data Ditambahkan', 'Berhasil menambahkan lokasi baru!');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, ambil pesan error
            $errors = $e->validator->errors();
            Alert::error('Error', $errors->first('name')); 

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.pages.locations.show', compact('location'));
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.pages.locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:locations,name,' . $id,
            ]);

            $location = Location::findOrFail($id);
            $location->update($request->all());

            Alert::success('Data Diupdate', 'Berhasil memperbarui lokasi!');
            return redirect()->route('locations');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, ambil pesan error
            $errors = $e->validator->errors();
            Alert::error('Error', $errors->first('name')); // Tampilkan pesan error

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function destroy($id)
    {
        // Cek apakah lokasi masih digunakan di tabel plants
        $isUsed = DB::table('plants')->where('location_id', $id)->exists();

        if ($isUsed) {
            // Tampilkan pesan error jika lokasi masih digunakan
            Alert::error('Gagal menghapus lokasi', 'Lokasi ini masih digunakan oleh data lain');
            return redirect()->route('locations');
        }

        // Jika lokasi tidak digunakan, lanjutkan penghapusan
        $location = Location::findOrFail($id);
        $location->delete();

        // Tampilkan pesan sukses
        Alert::success('Hapus Data Lokasi', 'Berhasil menghapus data lokasi!');
        return redirect()->route('locations');
    }

}
