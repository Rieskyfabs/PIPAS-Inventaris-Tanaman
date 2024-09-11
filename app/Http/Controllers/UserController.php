<?php

namespace App\Http\Controllers;

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
        // Ambil semua user
        $users = User::all();

        // Hitung jumlah user yang aktif dan tidak aktif
        $activeUsersCount = User::where('status', 'active')->count();
        $inactiveUsersCount = User::where('status', 'inactive')->count();

        // Iterasi setiap user untuk menambahkan warna acak
        foreach ($users as $user) {
            $user->colors = $this->randomColor(); // Panggil fungsi randomColor untuk setiap user
        }

        // Kirim data user ke view
        return view('admin.pages.users.index', compact('users', 'activeUsersCount', 'inactiveUsersCount'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        Alert::success('User Ditambahkan', 'Berhasil menambahkan data User');

        return redirect()->route('users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        Alert::success('Edit Data User', 'Berhasil mengUpdate data User');
        return redirect()->route('users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Alert::success('Hapus Data User', 'Berhasil mengHapus data User');
        return redirect()->route('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.users.show', compact('user'));
    }

}
