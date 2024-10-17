<?php

namespace App\Http\Controllers;

use App\Models\TanamanKeluar;
use App\Models\TanamanMasuk;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanTanamanKeluarExport;
use App\Exports\LaporanTanamanMasukExport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function laporanTanamanMasuk(Request $request)
  {
    // Ambil input start_date dan end_date dari request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Ambil data tanaman masuk
    $laporanTanamanMasuk = TanamanMasuk::with('plant');

    // Jika tanggal awal dan akhir diinput, tambahkan filter ke query
    if ($startDate && $endDate) {
      $laporanTanamanMasuk = $laporanTanamanMasuk->whereBetween('tanggal_masuk', [$startDate, $endDate]);
    }

    // Urutkan hasil query
    $laporanTanamanMasuk = $laporanTanamanMasuk->orderBy('created_at', 'desc')->paginate(10); // Menambahkan pagination

    return view('admin.pages.reports.tanaman_masuk', compact('laporanTanamanMasuk'));
  }


  // Menampilkan laporan tanaman keluar
  public function laporanTanamanKeluar(Request $request)
  {
    // Ambil input start_date dan end_date dari request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Ambil data tanaman keluar yang statusnya 'sudah dipanen'
    $laporanTanamanKeluar = TanamanKeluar::with(['plant.plantAttribute'])
    ->whereHas('plant', function ($query) {
      $query->where('harvest_status', 'sudah dipanen');
    });

    // Jika tanggal awal dan akhir diinput, tambahkan filter ke query
    if ($startDate && $endDate) {
      $laporanTanamanKeluar = $laporanTanamanKeluar->whereBetween('tanggal_keluar', [$startDate, $endDate]);
    }

    // Urutkan hasil query
    $laporanTanamanKeluar = $laporanTanamanKeluar->orderBy('created_at', 'desc')->get();

    return view('admin.pages.reports.tanaman_keluar', compact('laporanTanamanKeluar'));
  }


  public function exportExcel(Request $request)
  {
    // Cek apakah kita mengekspor tanaman masuk atau keluar
    $type = $request->input('type');

    if ($type === 'masuk') {
      return Excel::download(new LaporanTanamanMasukExport, 'laporan_tanaman_masuk.xlsx');
    } else if ($type === 'keluar') {
      return Excel::download(new LaporanTanamanKeluarExport, 'laporan_tanaman_keluar.xlsx');
    }

    return back()->with('error', 'Tipe laporan tidak dikenali.');
  }

  public function exportPdf(Request $request)
  {
    // Ambil input start_date dan end_date dari request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $type = $request->input('type');

    if ($type === 'masuk') {
      $laporanTanamanMasuk = TanamanMasuk::with('plant')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanMasuk = $laporanTanamanMasuk->whereBetween('tanggal_masuk', [$startDate, $endDate]);
      }

      $laporanTanamanMasuk = $laporanTanamanMasuk->get();
      $pdf = PDF::loadView('reports.tanaman-masuk-pdf', compact('laporanTanamanMasuk'));

      return $pdf->download('laporan-tanaman-masuk.pdf');
    } elseif ($type === 'keluar') {
      $laporanTanamanKeluar = TanamanKeluar::with('plant.plantAttribute');

      if ($startDate && $endDate) {
        $laporanTanamanKeluar = $laporanTanamanKeluar->whereBetween('tanggal_keluar', [$startDate, $endDate]);
      }

      $laporanTanamanKeluar = $laporanTanamanKeluar->get();
      $pdf = PDF::loadView('reports.tanaman-keluar-pdf', compact('laporanTanamanKeluar'));

      return $pdf->download('laporan-tanaman-keluar.pdf');
    }

    return back()->with('error', 'Tipe laporan tidak dikenali.');
  }



  public function print(Request $request)
  {
    $type = $request->input('type');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    if ($type === 'masuk') {
      $laporanTanamanMasuk = TanamanMasuk::with('plant')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanMasuk = $laporanTanamanMasuk->whereBetween('tanggal_masuk', [$startDate, $endDate]);
      }

      $laporanTanamanMasuk = $laporanTanamanMasuk->get();
      return view('admin.pages.reports.tanaman-masuk-print', compact('laporanTanamanMasuk'));
    } elseif ($type === 'keluar') {
      $laporanTanamanKeluar = TanamanKeluar::with('plant.plantAttribute');

      if ($startDate && $endDate) {
        $laporanTanamanKeluar = $laporanTanamanKeluar->whereBetween('tanggal_keluar', [$startDate, $endDate]);
      }

      $laporanTanamanKeluar = $laporanTanamanKeluar->get();
      return view('admin.pages.reports.tanaman-keluar-print', compact('laporanTanamanKeluar'));
    }

    return back()->with('error', 'Tipe laporan tidak dikenali.');
  }


}
