<?php

namespace App\Http\Controllers;

use App\Models\TanamanKeluar;
use App\Models\TanamanMasuk;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function tanamanMasuk()
    {
        $tanamanMasuk = TanamanMasuk::with('plant')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.transactions.tanaman_masuk', compact('tanamanMasuk'));
    }

    // Menampilkan laporan tanaman keluar
    public function tanamanKeluar()
    {
        // Ambil data tanaman keluar yang statusnya 'sudah dipanen'
        $tanamanKeluar = TanamanKeluar::with('plant')
        ->whereHas('plant', function ($query) {
            $query->where('status', 'sudah dipanen');
        })->get();

        return view('admin.pages.transactions.tanaman_keluar', compact('tanamanKeluar'));
    }
}
