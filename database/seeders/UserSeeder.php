<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a worker user
        User::factory()->create([
            'name' => 'Worker User',
            'email' => 'worker@example.com',
            'role' => 'worker',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a regular user
        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'role' => 'user',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
    }
}
