<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use App\Models\Benefit;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with(['category', 'benefit'])->get();
        return view('admin.pages.plants.index', compact('plants'));
    }

    public function create()
    {
        $categories = Category::all();
        $benefits = Benefit::all();
        return view('admin.pages.plants.create', compact('categories', 'benefits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'barcode' => 'required|string|unique:plants,barcode',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Vegetable',
            'location' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'benefit_id' => 'required|exists:benefits,id',
            'status' => 'required|string|max:50', // validasi untuk status
            'seeding_date' => 'required|date', // validasi untuk tanggal pembibitan
        ]);

        // Tambahkan logika untuk menghitung estimasi tanggal panen
        $seedingDate = $request->input('seeding_date');
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +90 days')); // Misal estimasi 90 hari dari tanggal pembibitan

        // Menyimpan data ke dalam database
        Plant::create(array_merge($request->all(), ['harvest_date' => $harvestDate]));

        return redirect()->route('plants')->with('success', 'Plant added successfully.');
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $categories = Category::all();
        $benefits = Benefit::all();
        return view('admin.pages.plants.edit', compact('plant', 'categories', 'benefits'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'barcode' => 'required|string|unique:plants,barcode,' . $id,
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Vegetable',
            'location' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'benefit_id' => 'required|exists:benefits,id',
            'status' => 'required|string|max:50', // validasi untuk status
            'seeding_date' => 'required|date', // validasi untuk tanggal pembibitan
        ]);

        $plant = Plant::findOrFail($id);

        // Menghitung ulang estimasi tanggal panen jika tanggal pembibitan diperbarui
        $seedingDate = $request->input('seeding_date');
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +90 days')); // Misal estimasi 90 hari dari tanggal pembibitan

        // Memperbarui data di dalam database
        $plant->update(array_merge($request->all(), ['harvest_date' => $harvestDate]));

        return redirect()->route('plants')->with('success', 'Plant updated successfully.');
    }

    public function destroy($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return redirect()->route('plants')->with('success', 'Plant deleted successfully.');
    }

    public function show($id)
    {
        $plant = Plant::with(['category', 'benefit'])->findOrFail($id);
        return view('admin.pages.plants.show', compact('plant'));
    }
}
