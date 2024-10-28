<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();

        $title = 'Apakah anda yakin ingin menghapus manfaat ini?';
        $text = "semua data tanaman dengan manfaat ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.benefits.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.pages.benefits.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:benefits',
            ]);

            Benefit::create($request->all());

            Alert::success('Data Ditambahkan', 'Berhasil menambahkan deskripsi manfaat baru!');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, ambil pesan error
            $errors = $e->validator->errors();
            Alert::error('Error', $errors->first('name'));

            return redirect()->back()->withInput()->withErrors($errors);
        }

    }

    public function edit($id)
    {
        $benefit = Benefit::findOrFail($id);
        return view('admin.pages.benefits.edit', compact('benefit'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:benefits,name,' . $id,
            ]);

            $benefit = Benefit::findOrFail($id);
            $benefit->update($request->all());

            Alert::success('Data Diupdate', 'Berhasil memperbarui deskripsi!');
            return redirect()->route('benefits');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, ambil pesan error
            $errors = $e->validator->errors();
            Alert::error('Error', $errors->first('name')); // Tampilkan pesan error

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();

        Alert::success('Hapus Data Benefits', 'Berhasil menghapus data benefits');
        return redirect()->route('benefits');
    }
}
