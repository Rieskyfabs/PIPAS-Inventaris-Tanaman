<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::orderBy('created_at', 'desc')->get();

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
        $location = Location::findOrFail($id);
        $location->delete();

        Alert::success('Hapus Data Locations', 'Berhasil menghapus data lokasi');
        return redirect()->route('locations');
    }
}
