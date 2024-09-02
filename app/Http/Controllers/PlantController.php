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
        return view('admin.plants.create', compact('categories', 'benefits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'barcode' => 'required|string|unique:plants',
            'category_id' => 'required|exists:categories,category_id',
            'location' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'benefit_id' => 'required|exists:benefits,benefit_id',
        ]);

        Plant::create($request->all());

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
            'category_id' => 'required|exists:categories,category_id',
            'location' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'benefit_id' => 'required|exists:benefits,benefit_id',
        ]);

        $plant = Plant::findOrFail($id);
        $plant->update($request->all());

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
        return view('admin.plants.show', compact('plant'));
    }
}

