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

    // Jika tanggal awal diinput, tambahkan filter ke query
    if ($startDate) {
      $laporanTanamanMasuk = $laporanTanamanMasuk->where('tanggal_masuk', '>=', $startDate);
    }

    // Jika tanggal akhir diinput, tambahkan filter ke query
    if ($endDate) {
      $laporanTanamanMasuk = $laporanTanamanMasuk->where('tanggal_masuk', '<=', $endDate);
    }

    // Urutkan hasil query dan tambahkan pagination
    $laporanTanamanMasuk = $laporanTanamanMasuk->orderBy('created_at', 'desc')->paginate(10);

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

    // Jika tanggal awal diinput, tambahkan filter ke query
    if ($startDate) {
      $laporanTanamanKeluar = $laporanTanamanKeluar->where('tanggal_keluar', '>=', $startDate);
    }

    // Jika tanggal akhir diinput, tambahkan filter ke query
    if ($endDate) {
      $laporanTanamanKeluar = $laporanTanamanKeluar->where('tanggal_keluar', '<=', $endDate);
    }

    // Urutkan hasil query dan ambil data
    $laporanTanamanKeluar = $laporanTanamanKeluar->orderBy('created_at', 'desc')->get();

    return view('admin.pages.reports.tanaman_keluar', compact('laporanTanamanKeluar'));
  }


  public function exportExcel(Request $request)
  {
    // Ambil input start_date dan end_date dari request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $type = $request->input('type');
    $date = now()->format('Y-m-d');

    if ($type === 'masuk') {
      $laporanTanamanMasuk = TanamanMasuk::with('plant')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanMasuk = $laporanTanamanMasuk->whereBetween('tanggal_masuk', [$startDate, $endDate]);
      }

      return Excel::download(new LaporanTanamanMasukExport($laporanTanamanMasuk->get()), "laporan_tanaman_masuk_{$date}.xlsx");
    } else if ($type === 'keluar') {
      $laporanTanamanKeluar = TanamanKeluar::with('plant.plantAttribute')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanKeluar = $laporanTanamanKeluar->whereBetween('tanggal_keluar', [$startDate, $endDate]);
      }

      return Excel::download(new LaporanTanamanKeluarExport($laporanTanamanKeluar->get()), "laporan_tanaman_keluar_{$date}.xlsx");
    }

    return back()->with('error', 'Tipe laporan tidak dikenali.');
  }

  public function exportPdf(Request $request)
  {
    // Ambil input start_date dan end_date dari request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $type = $request->input('type');
    $date = now()->format('Y-m-d');

    if ($type === 'masuk') {
      $laporanTanamanMasuk = TanamanMasuk::with('plant')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanMasuk = $laporanTanamanMasuk->whereBetween('tanggal_masuk', [$startDate, $endDate]);
      }

      $laporanTanamanMasuk = $laporanTanamanMasuk->get();
      $pdf = PDF::loadView('reports.tanaman-masuk-pdf', compact('laporanTanamanMasuk'));

      return $pdf->download("laporan_tanaman_masuk_{$date}.pdf");
    } elseif ($type === 'keluar') {
      $laporanTanamanKeluar = TanamanKeluar::with('plant.plantAttribute')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanKeluar = $laporanTanamanKeluar->whereBetween('tanggal_keluar', [$startDate, $endDate]);
      }

      $laporanTanamanKeluar = $laporanTanamanKeluar->get();
      $pdf = PDF::loadView('reports.tanaman-keluar-pdf', compact('laporanTanamanKeluar'));

      return $pdf->download("laporan_tanaman_keluar_{$date}.pdf");
    }

    return back()->with('error', 'Tipe laporan tidak dikenali.');
  }

  public function print(Request $request)
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

      return view('admin.pages.reports.tanaman-masuk-print', compact('laporanTanamanMasuk'));
    } elseif ($type === 'keluar') {
      $laporanTanamanKeluar = TanamanKeluar::with('plant.plantAttribute')->orderBy('created_at', 'desc');

      if ($startDate && $endDate) {
        $laporanTanamanKeluar = $laporanTanamanKeluar->whereBetween('tanggal_keluar', [$startDate, $endDate]);
      }

      $laporanTanamanKeluar = $laporanTanamanKeluar->get();

      return view('admin.pages.reports.tanaman-keluar-print', compact('laporanTanamanKeluar'));
    }

    return back()->with('error', 'Tipe laporan tidak dikenali.');
  }


}
