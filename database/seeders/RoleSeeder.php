<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $staff = Role::create(['name' => 'Staff']);






        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-jenis-cuti',
            'edit-jenis-cuti',
            'delete-jenis-cuti',
            'create-pengajuan',
            'edit-pengajuan',
            'delete-pengajuan',
            'filter'
        ]);

        $staff->givePermissionTo([
            'create-jenis-cuti',
            'edit-jenis-cuti',
            'delete-jenis-cuti',
            'create-pengajuan',
            'edit-pengajuan',
            'delete-pengajuan',
            'filter'
        ]);
    }
}
