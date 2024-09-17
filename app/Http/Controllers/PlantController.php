<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use App\Models\Benefit;
use App\Models\Location;
use App\Models\PlantCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;


class PlantController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai filter periode dari request, default 'today'
        $period = $request->input('period', 'today');

        // Tentukan tanggal awal dan akhir berdasarkan periode yang dipilih
        $startDate = Carbon::today(); // Default untuk 'Hari ini'
        $endDate = Carbon::now(); // Hari ini adalah batas akhir

        // Tentukan periode sebelumnya
        $previousStartDate = Carbon::yesterday();
        $previousEndDate = Carbon::yesterday();

        switch ($period) {
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                $previousStartDate = Carbon::now()->subMonth()->startOfMonth();
                $previousEndDate = Carbon::now()->subMonth()->endOfMonth();
                break;
            case 'this_year':
                $startDate = Carbon::now()->startOfYear();
                $previousStartDate = Carbon::now()->subYear()->startOfYear();
                $previousEndDate = Carbon::now()->subYear()->endOfYear();
                break;
        }

        // Ambil data tanaman dan group berdasarkan kode tanaman
        $plants = Plant::selectRaw('MIN(id) as id, plant_code_id, MIN(plant_name_id) as name, MIN(plant_scientific_name_id) as scientific_name, MIN(type) as type, MIN(category_id) as category_id, MIN(benefit_id) as benefit_id, MIN(location_id) as location_id, MIN(status) as status, MIN(seeding_date) as seeding_date, COUNT(*) as total_quantity, MAX(created_at) as created_at')
        ->groupBy('plant_code_id')
        ->orderBy('created_at', 'desc')
        ->with(['plantCode', 'category', 'benefit', 'location'])
        ->get();

        // Hitung total tanaman
        $totalPlants = $plants->sum('total_quantity');

        // Hitung total tanaman pada periode sebelumnya
        $previousTotalPlants = Plant::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // Hitung jumlah tanaman masuk berdasarkan seeding_date dan periode filter
        $plantsIn = Plant::whereBetween('created_at', [$startDate, $endDate])->count();

        // Hitung jumlah tanaman masuk pada periode sebelumnya
        $previousPlantsIn = Plant::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // Hitung jumlah tanaman keluar berdasarkan harvest_date dan periode filter
        $plantsOut = Plant::whereBetween('harvest_date', [$startDate, $endDate])->count();

        // Hitung jumlah tanaman keluar pada periode sebelumnya
        $previousPlantsOut = Plant::whereBetween('harvest_date', [$previousStartDate, $previousEndDate])->count();

        // Hitung jumlah berdasarkan status tanaman
        $countByStatus = Plant::selectRaw('status, COUNT(*) as total_quantity')
        ->groupBy('status')
        ->pluck('total_quantity', 'status');

        // Data untuk chart
        $chartData = [
            'series' => $countByStatus->values()->toArray(),
            'labels' => $countByStatus->keys()->toArray()
        ];

        // Hitung changePercent dan changeType untuk tanaman masuk
        if ($previousPlantsIn > 0) {
            $changePercentIn = (($plantsIn - $previousPlantsIn) / $previousPlantsIn) * 100;
        } else {
            $changePercentIn = $plantsIn > 0 ? 100 : 0;
        }
        $changeTypeIn = $changePercentIn >= 0 ? 'increase' : 'decrease';

        // Hitung changePercent dan changeType untuk tanaman keluar
        if ($previousPlantsOut > 0) {
            $changePercentOut = (($plantsOut - $previousPlantsOut) / $previousPlantsOut) * 100;
        } else {
            $changePercentOut = $plantsOut > 0 ? 100 : 0;
        }
        $changeTypeOut = $changePercentOut >= 0 ? 'increase' : 'decrease';

        // Hitung changePercent dan changeType untuk total tanaman
        if ($previousTotalPlants > 0) {
            $changePercentTotal = (($totalPlants - $previousTotalPlants) / $previousTotalPlants) * 100;
        } else {
            $changePercentTotal = $totalPlants > 0 ? 100 : 0;
        }
        $changeTypeTotal = $changePercentTotal >= 0 ? 'increase' : 'decrease';

        return view('admin.pages.plants.index', compact(
            'plants',
            'totalPlants',
            'plantsIn',
            'plantsOut',
            'countByStatus',
            'chartData',
            'period',
            'changePercentIn',
            'changeTypeIn',
            'changePercentOut',
            'changeTypeOut',
            'changePercentTotal',
            'changeTypeTotal'
        ));
    }



    public function create()
    {
        $categories = Category::all();
        $benefits = Benefit::all();
        $locations = Location::all();
        $plantCodes  = PlantCode::all();

        return view('admin.pages.plants.create', compact('categories', 'benefits', 'locations', 'plantCodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plant_name_id' => 'required',
            'plant_scientific_name_id' => 'required',
            'qr_code' => 'nullable|string|unique:plants,qr_code',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Sayuran',
            'plant_code_id' => 'required|exists:plant_codes,id',
            'benefit_id' => 'required|exists:benefits,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
        ]);

        $seedingDate = $request->input('seeding_date');
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +90 days'));

        Plant::create(array_merge($request->all(), ['harvest_date' => $harvestDate]));

        // Tampilkan pesan sukses
        Alert::success('Data Tanaman Ditambahkan', 'Berhasil menambahkan data Tanaman');

        // Redirect ke halaman users
        return redirect()->back();
    }

    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        $categories = Category::all();
        $benefits = Benefit::all();
        $locations = Location::all();
        $plantCodes = PlantCode::all();

        return view('admin.pages.plants.edit', compact('plant', 'categories', 'benefits', 'locations', 'plantCodes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plant_name_id' => 'required|string|max:255',
            'plant_scientific_name_id' => 'required|string|max:255',
            'qr_code' => 'nullable|string|unique:plants,qr_code,' . $id,
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:Herbal,Sayuran',
            'plant_code_id' => 'required|exists:plant_codes,id',
            'benefit_id' => 'required|exists:benefits,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|string|in:sehat,baik,layu,sakit',
            'seeding_date' => 'required|date',
        ]);

        $plant = Plant::findOrFail($id);

        $seedingDate = $request->input('seeding_date');
        $harvestDate = date('Y-m-d', strtotime($seedingDate . ' +90 days'));

        $plant->update(array_merge($request->all(), ['harvest_date' => $harvestDate]));

        // Tampilkan pesan sukses
        Alert::success('Data Tanaman DiUpdate', 'Berhasil mengUpdate data Tanaman');

        // Redirect ke halaman users
        return redirect()->route('plants');
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

        return redirect()->back()->with('success', 'Plant deleted successfully');
    }

    public function show($plantCode)
    {

        $plants = Plant::with('category', 'benefit', 'location')
            ->whereHas('plantCode', function ($query) use ($plantCode) {
                $query->where('plant_code', $plantCode);
            })->get();


        return view('admin.pages.plants.show', compact('plants'));
    }

}
