<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cache roles dan permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat daftar permissions
        $permissions = [
            'manage users',
            'manage plants',
            'manage categories',
            'manage benefits',
            'manage locations',
            'manage plant-codes',
        ];

        // Buat setiap permission dengan guard_name
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',  // Tambahkan guard_name
            ]);
        }

        // Buat roles dan assign permissions dengan guard_name
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $masterRole = Role::create(['name' => 'master', 'guard_name' => 'web']);
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'web']);

        // Assign semua permissions ke admin
        $adminRole->givePermissionTo(['manage plants', 'manage categories']);

        // Assign beberapa permissions ke master
        $masterRole->givePermissionTo(Permission::all());

        // Assign satu permission ke user
        $userRole->givePermissionTo('manage plants');
    }
}
