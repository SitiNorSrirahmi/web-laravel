<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = ['lihat produk', 'tambah produk', 'edit produk', 'hapus produk'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(['lihat produk', 'tambah produk', 'edit produk', 'hapus produk']);

        $staff = Role::firstOrCreate(['name' => 'staff']);
        $staff->syncPermissions(['lihat produk', 'tambah produk', 'edit produk']);
    }
}