<?php

namespace App\Http\Controllers;

use App\Helpers\ActivityLogger;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        $activeUsersCount = User::where('status', 'active')->count();
        $inactiveUsersCount = User::where('status', 'inactive')->count();

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
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
            'role_id' => 'required|exists:roles,id',
            'status' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status,
        ]);

        // Tampilkan pesan sukses
        Alert::success('User Ditambahkan', 'Berhasil menambahkan data User');

        ActivityLogger::log('create', 'Created a new User Data with name: ' . $request->username);

        // Redirect ke halaman users
        return redirect()->route('users');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.pages.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->save();

        ActivityLogger::log('update', 'Updated User Data with ID: ' . $user->id);

        Alert::success('Edit Data User', 'Berhasil mengupdate data User');

        return redirect()->route('users');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        ActivityLogger::log('delete', 'Deleted User Data with ID: ' . $user->id);

        Alert::success('Hapus Data User', 'Berhasil mengHapus data User');

        return redirect()->route('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.users.show', compact('user'));
    }

}
