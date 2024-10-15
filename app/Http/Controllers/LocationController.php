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
        $locations = Location::all();

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
        $request->validate([
            'name' => 'required|string|max:255|unique:locations',
        ]);

        Location::create($request->all());

        Alert::success('Data Ditambahkan', 'Berhasil menambahkan lokasi baru!');

        return redirect()->back();
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
        $request->validate([
            'name' => 'required|string|max:255|unique:locations,name,' . $id,
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        Alert::success('Data Diupdate', 'Berhasil memperbarui lokasi!');

        return redirect()->route('locations');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        Alert::success('Hapus Data Locations', 'Berhasil menghapus data lokasi');
        return redirect()->route('locations');
    }
}
