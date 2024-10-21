<?php

namespace App\Http\Controllers;

use App\Models\PlantAttributes;
use App\Models\Category; // Add this to use categories
use App\Models\Benefit;  // Add this to use benefits
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
        // Fetch categories and benefits to populate select options
        $categories = Category::all();
        $benefits = Benefit::all();

        return view('admin.pages.plantAttributes.create', compact('categories', 'benefits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'plant_code' => 'required|string|max:9|unique:plant_attributes',
            'name' => 'required|string|max:255',
            'type' => 'required',
            'category_id' => 'required|exists:categories,id',
            'benefit_id' => 'required|exists:benefits,id',
            'description' => 'required|string',
        ]);

        // Create new plant attribute
        PlantAttributes::create($request->all());

        Alert::success('Tambah Atribut Tanaman', 'Berhasil menambahkan atribut tanaman baru');

        return redirect()->route('plantAttributes');
    }

    /**
     * Edit the plants attribute
     */
    public function edit($id)
    {
        $plantAttribute = PlantAttributes::findOrFail($id);
        $categories = Category::all();
        $benefits = Benefit::all();
        return view('admin.pages.plantAttributes.edit', compact('plantAttribute', 'categories', 'benefits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'plant_code' => 'required|string|max:9|unique:plant_attributes,plant_code,' . $id,
            'name' => 'required|string|max:255',
            'type' => 'required',
            'category_id' => 'required|exists:categories,id',
            'benefit_id' => 'required|exists:benefits,id',
            'description' => 'required|string',
        ]);

        $plantAttribute = PlantAttributes::findOrFail($id);

        $plantAttribute->update($request->all());

        Alert::success('Update Atribut Tanaman', 'Berhasil memperbarui atribut tanaman');

        return redirect()->route('plantAttributes');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plantAttributes = PlantAttributes::findOrFail($id);
        $plantAttributes->delete();

        Alert::success('Hapus Data Attribute Tanaman', 'Berhasil menghapus data Attribute Tanaman');

        return redirect()->back();
    }
}
