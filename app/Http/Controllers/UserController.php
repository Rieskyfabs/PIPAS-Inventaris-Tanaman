<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function randomColor()
    {
        // Batasan nilai warna agar warna lebih terang
        $min = 0xCC;
        $r = mt_rand($min, 0xFF);
        $g = mt_rand($min, 0xFF);
        $b = mt_rand($min, 0xFF);

        // Buat warna hex
        $randomColor = sprintf('#%02X%02X%02X', $r, $g, $b);

        // Hitung kecerahan warna
        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b);

        // Jika kecerahan rendah, warna teks jadi putih, jika tinggi warna teks jadi hitam
        $textColor = ($luminance > 186) ? '#000000' : '#FFFFFF';

        return ['background' => $randomColor, 'text' => $textColor];
    }

    public function index()
    {
        $users = User::all();

        $activeUsersCount = User::where('status', 'active')->count();
        $inactiveUsersCount = User::where('status', 'inactive')->count();

        foreach ($users as $user) {
            $user->colors = $this->randomColor();
        }

        // Kirim data user ke view
        return view('admin.pages.users.index', compact('users', 'activeUsersCount', 'inactiveUsersCount'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id', // Pastikan role_id ada
            'status' => 'required',
        ]);

        // Simpan user ke database
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id, // Pastikan role_id diinput
            'status' => $request->status,
        ]);

        // Tampilkan pesan sukses
        Alert::success('User Ditambahkan', 'Berhasil menambahkan data User');

        // Redirect ke halaman users
        return redirect()->route('users');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Ambil semua role untuk dropdown di form
        return view('admin.pages.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input, pengecekan unique diabaikan jika datanya tidak berubah
        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Password tidak wajib diisi
            'role_id' => 'required|exists:roles,id',
            'status' => 'required',
        ]);

        // Update data user
        $user->username = $request->username;
        $user->email = $request->email;

        // Hanya update password jika ada input
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->save();

        // Tampilkan pesan sukses
        Alert::success('Edit Data User', 'Berhasil mengUpdate data User');

        // Redirect ke halaman users
        return redirect()->route('users');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Simpan pesan ke dalam session untuk konfirmasi penghapusan
        session()->flash('alert.delete', json_encode([
            'title' => 'Apakah Anda yakin?',
            'text' => 'User akan dihapus secara permanen!',
            'icon' => 'warning',
            'showCancelButton' => true,
            'confirmButtonText' => 'Ya, hapus!',
            'cancelButtonText' => 'Batal'
        ]));

        Alert::success('Hapus Data User', 'Berhasil mengHapus data User');
        return redirect()->route('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.users.show', compact('user'));
    }

}
