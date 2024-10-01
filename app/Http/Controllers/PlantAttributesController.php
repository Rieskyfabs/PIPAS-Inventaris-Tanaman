<?php

namespace App\Http\Controllers;

use App\Models\PlantAttributes;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlantAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantAttributes = PlantAttributes::with(['category', 'benefit'])->get();

        $title = 'Delete Plant Attributes!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.pages.plantAttributes.index', compact('plantAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plantAttributes = PlantAttributes::findOrFail($id);

        // Hapus record tanaman dari database
        $plantAttributes->delete();

        Alert::success('Hapus Data Attribute Tanaman', 'Berhasil menghapus data Attribute Tanaman');

        return redirect()->back();
    }
}
