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

        // Technician Users
        $technicians = [
            [
                'name' => 'Tech 1',
                'email' => 'tech1@example.com',
            ],
            [
                'name' => 'Tech 2',
                'email' => 'tech2@example.com',
            ],
            [
                'name' => 'Tech 3',
                'email' => 'tech3@example.com',
            ],
        ];
        
        foreach ($technicians as $tech) {
            $user = User::firstOrCreate(
                ['email' => $tech['email']],
                [
                    'name' => $tech['name'],
                    'password' => Hash::make('password'), // Set a secure password
                ]
            );
            $user->assignRole('technician');

            // Create linked technician profile
            Technician::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'approved' => true,
                ]
            );
        }
    }
}
