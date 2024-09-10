<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use App\Models\Benefit;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with(['category', 'benefit', 'location'])->get();

        $totalQuantity = $plants->sum('quantity');

        $countByStatus = $plants->groupBy('status')->mapWithKeys(function ($group, $status) {
            return [$status => $group->count()];
        });

        // Mengubah data untuk chart
        $chartData = [
            'series' => $countByStatus->values()->toArray(),
            'labels' => $countByStatus->keys()->toArray()
        ];

        return view('admin.pages.plants.index', compact('plants', 'totalQuantity', 'countByStatus', 'chartData'));
    }


    public function create()
    {
        $categories = Category::all();
        $benefits = Benefit::all();
        $location = Location::all();

        return view('admin.pages.plants.create', compact('categories', 'benefits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'qr_code' => 'required|string|unique:plants,qr_code',
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
            'qr_code' => 'required|string|unique:plants,qr_code,' . $id,
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

        // Hapus file QR code jika ada
        if ($plant->qr_code) {
            Storage::disk('public')->delete($plant->qr_code);
        }

        // Hapus record tanaman dari database
        $plant->delete();
        Alert::success('Hapus Data Tanaman', 'Berhasil mengHapus data Tanaman');

        return redirect()->route('plants')->with('success', 'Plant deleted successfully');
    }

    public function show($id)
    {
        // Cari data tanaman berdasarkan ID
        $plant = Plant::with('category', 'benefit', 'location')->findOrFail($id);

        // Return view dengan data tanaman
        return view('admin.pages.plants.show', compact('plant'));
    }
}
