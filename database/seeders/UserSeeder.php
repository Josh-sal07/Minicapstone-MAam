<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Technician;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ensure roles exist
        $roles = ['admin', 'user', 'technician'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Admin
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Regular User
        $user = User::firstOrCreate([
            'email' => 'user@example.com',
        ], [
            'name' => 'Regular User',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');

        // Technician User
        $technicianUser = User::firstOrCreate([
            'email' => 'tech@example.com',
        ], [
            'name' => 'Tech User',
            'password' => Hash::make('password'),
        ]);
        $technicianUser->assignRole('technician');

        // Technician Profile (linked)
        Technician::firstOrCreate([
            'user_id' => $technicianUser->id,
        ], [
            'name' => $technicianUser->name,
            'email' => $technicianUser->email,
            'approved' => true,
        ]);
    }

}
