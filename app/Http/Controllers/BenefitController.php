<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();
        return view('admin.pages.benefits.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.pages.benefits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        Benefit::create($request->all());

        return redirect()->route('benefits')->with('success', 'Benefit added successfully.');
    }

    public function edit($id)
    {
        $benefit = Benefit::findOrFail($id);
        return view('admin.pages.benefits.edit', compact('benefit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $benefit = Benefit::findOrFail($id);
        $benefit->update($request->all());

        return redirect()->route('benefits')->with('success', 'Benefit updated successfully.');
    }

    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        $benefit->delete();

        return redirect()->route('benefits')->with('success', 'Benefit deleted successfully.');
    }
}

