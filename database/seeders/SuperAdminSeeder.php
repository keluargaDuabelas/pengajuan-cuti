<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Javed Ur Rehman',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Syed Ahsan Kamal',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $staff = User::create([
            'name' => 'Abdul Muqeet',
            'email' => 'kepeg@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        $staff->assignRole('Staff');
    }
}
