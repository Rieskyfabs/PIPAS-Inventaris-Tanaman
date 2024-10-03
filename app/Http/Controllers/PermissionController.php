<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::orderBy('created_at', 'DESC')->get();
        $title = 'Hapus Data Permission?';
        $text = "Apakah Anda Yakin Ingin Menghapus Data ini?";
        confirmDelete($title, $text);

        return view('role-permission.permission.index', compact('permissions',));
    }

    public function create() {
        return view('role-permission.permission.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);

        if($validator->passes()) {
            Permission::create(['name' => $request->name]);

            Alert::success('Berhasil!', 'Berhasil menambahkan data permission.');
            
            return redirect()->route('permissions.create');
        } else {

            Alert::warning('Error', 'gagal menambahkan data permission.');

            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
        
    }

    public function edit($id) {
        $permission = Permission::findorFail($id);

        return view('role-permission.permission.edit', compact('permission'));
    }

    public function update($id, Request $request) {
        $permission = Permission::findorFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,'.$id.',id'
        ]);

        if ($validator->passes()) {
            
            $permission->name = $request->name;
            $permission->save();

            Alert::success('Berhasil!', 'Berhasil mengupdate data permission.');

            return redirect()->route('permissions');
        } else {

            Alert::warning('Error', 'gagal menambahkan data permission.');

            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        Alert::success('Hapus Data Permissions', 'Berhasil mengHapus data Permissions');
        return redirect()->route('permissions');
    }

}
