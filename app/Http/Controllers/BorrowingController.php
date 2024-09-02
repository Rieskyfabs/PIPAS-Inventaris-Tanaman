<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    // Menampilkan daftar peminjaman
    public function index()
    {
        $borrowings = Borrowing::with('plant', 'user')->get();
        return view('admin.pages.borrowing.index', compact('borrowings'));
    }

    // Menampilkan form untuk menambah peminjaman
    public function create()
    {
        $plants = Plant::all();
        $users = User::all();
        return view('admin.pages.borrowing.create', compact('plants', 'users'));
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'user_id' => 'required|exists:users,id',
            'borrowed_at' => 'required|date',
            'return_due' => 'required|date|after_or_equal:borrowed_at',
        ]);

        Borrowing::create($request->all());

        return redirect()->route('borrowing')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    // Menampilkan detail peminjaman
    public function show($id)
    {
        $borrowing = Borrowing::with('plant', 'user')->findOrFail($id);
        return view('admin.pages.borrowing.show', compact('borrowing'));
    }

    // Menampilkan form untuk mengedit peminjaman
    public function edit($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $plants = Plant::all();
        $users = User::all();
        return view('admin.pages.borrowing.tabedit', compact('borrowing', 'plants', 'users'));
    }

    // Memperbarui data peminjaman
    public function update(Request $request, $id)
    {
        $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'user_id' => 'required|exists:users,id',
            'borrowed_at' => 'required|date',
            'return_due' => 'required|date|after_or_equal:borrowed_at',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $borrowing->update($request->all());

        return redirect()->route('borrowing')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    // Menghapus data peminjaman
    public function destroy($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $borrowing->delete();

        return redirect()->route('borrowing')->with('success', 'Peminjaman berhasil dihapus.');
    }
}

