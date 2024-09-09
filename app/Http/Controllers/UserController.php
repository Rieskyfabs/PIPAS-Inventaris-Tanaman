<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // Menghitung pengguna aktif
        $activeUsersCount = User::where('status', 'active')->count();

        // Menghitung pengguna tidak aktif
        $inactiveUsersCount = User::where('status', 'inactive')->count();


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
        $users = User::with(['category', 'benefit'])->findOrFail($id);
        return view('admin.pages.plants.show', compact('plant'));
    }
}
