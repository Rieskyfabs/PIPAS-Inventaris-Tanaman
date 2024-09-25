<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_at', 'DESC')->get();
        $title = 'Hapus Data Role?';
        $text = "Apakah Anda Yakin Ingin Menghapus Data ini?";
        confirmDelete($title, $text);

        return view('role-permission.role.index', compact('roles',));
    }

    public function create()
    {
        return view('role-permission.role.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);

        if ($validator->passes()) {
            Role::create(['name' => $request->name]);

            Alert::success('Berhasil!', 'Berhasil menambahkan data role.');

            return redirect()->route('roles.create');
        } else {

            Alert::warning('Error', 'gagal menambahkan data role.');

            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $role = Role::findorFail($id);

        return view('role-permission.role.edit', compact('role'));
    }

    public function update($id, Request $request)
    {
        $role = Role::findorFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name,' . $id . ',id'
        ]);

        if ($validator->passes()) {

            $role->name = $request->name;
            $role->save();

            Alert::success('Berhasil!', 'Berhasil mengupdate data role.');

            return redirect()->route('roles');
        } else {

            Alert::warning('Error', 'gagal menambahkan data role.');

            return redirect()->route('roles.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        Alert::success('Hapus Data Role', 'Berhasil mengHapus data Role');
        return redirect()->route('roles');
    }
}
