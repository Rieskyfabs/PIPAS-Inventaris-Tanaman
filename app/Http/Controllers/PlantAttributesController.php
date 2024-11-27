<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\PlantAttributes;
use App\Models\Category;
use App\Models\TipeTanaman; // Use this for plant types
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PlantAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantAttributes = PlantAttributes::with(['category', 'plantType']) // Ensure you're fetching the type too
            ->orderBy('created_at', 'desc')
            ->get();
        $categories = Category::all();
        $plantTypes = TipeTanaman::all(); // Fetch plant types for the view

        $title = 'Apakah anda yakin?';
        $text = "semua data tanaman dengan kategori ini akan terhapus juga";
        confirmDelete($title, $text);

        return view('admin.pages.plantAttributes.index', compact('plantAttributes', 'categories', 'plantTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $plantTypes = TipeTanaman::all(); // Fetch plant types

        return view('admin.pages.plantAttributes.create', compact('categories', 'plantTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'plant_code' => 'required|string|max:9|unique:plant_attributes',
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:tipe_tanaman,id', // Ensure this exists
            'category_id' => 'required|exists:categories,id',
            'benefit' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            Alert::error('Error', 'Terjadi kesalahan: ' . $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new plant attribute
        $plantAttribute = PlantAttributes::create($request->all());

        // Log activity
        ActivityLogger::log(
            'Create',
            'Menambahkan data tanaman dengan kode: <b>' . e($plantAttribute->plant_code) . '</b>'
        );

        Alert::success('Data Tanaman Ditambahkan', 'Berhasil menambahkan data Tanaman');
        return redirect()->route('plantAttributes');
    }

    /**
     * Edit the plants attribute
     */
    public function edit($id)
    {
        $plantAttribute = PlantAttributes::findOrFail($id);
        $categories = Category::all();
        $plantTypes = TipeTanaman::all(); // Fetch plant types

        return view('admin.pages.plantAttributes.edit', compact('plantAttribute', 'categories', 'plantTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'plant_code' => 'required|string|max:9|unique:plant_attributes,plant_code,' . $id,
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:tipe_tanaman,id', // Ensure this exists
            'category_id' => 'required|exists:categories,id',
            'benefit' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::error('Error', 'Terjadi kesalahan: ' . $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $plantAttribute = PlantAttributes::findOrFail($id);
        $plantAttribute->update($request->all());

        ActivityLogger::log(
            'Update',
            'Memperbarui data tanaman dengan kode: <b>' . e($plantAttribute->plant_code) . '</b>'
        );

        Alert::success('Data Tanaman Diperbarui', 'Berhasil memperbarui data Tanaman');
        return redirect()->route('plantAttributes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plantAttribute = PlantAttributes::findOrFail($id);

        ActivityLogger::log(
            'Delete',
            'Menghapus data Atribut tanaman dengan kode: <b>' . e($plantAttribute->plant_code) . '</b>'
        );

        $plantAttribute->delete();

        Alert::success('Data Atribut Tanaman Dihapus', 'Berhasil menghapus data atribut tanaman');
        return redirect()->back();
    }

    public function addNewCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json(['success' => true, 'id' => $category->id, 'name' => $category->name]);
    }

    public function addNewType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validasi nama harus unik
        ]);

        // Jika validasi lulus, tambahkan tipe tanaman baru
        $plantType = new TipeTanaman();
        $plantType->name = $request->name;
        $plantType->save();

        return response()->json(['success' => true, 'id' => $plantType->id, 'name' => $plantType->name]);
    }

}
