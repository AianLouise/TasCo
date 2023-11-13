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
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a worker user
        User::factory()->create([
            'name' => 'Elijah Farrell',
            'email' => 'worker@example.com',
            'role' => 'worker',
            'job_title'=> 'Electrician',
            'is_verified'=> '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
        User::factory()->create([
            'name' => 'Wayne Harding',
            'email' => 'worker2@example.com',
            'role' => 'worker',
            'job_title'=> 'Plumber',
            'is_verified'=> '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
        User::factory()->create([
            'name' => 'Astra Burch',
            'email' => 'worker3@example.com',
            'role' => 'worker',
            'job_title'=> 'Teacher',
            'is_verified'=> '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a regular user
        User::factory()->create([
            'name' => 'Audra Mcneil',
            'email' => 'user@example.com',
            'role' => 'user',
            'is_verified'=> '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
        User::factory()->create([
            'name' => 'Iliana Mooney',
            'email' => 'user2@example.com',
            'role' => 'user',
            'is_verified'=> '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
        User::factory()->create([
            'name' => 'Arsenio Horne',
            'email' => 'user3@example.com',
            'role' => 'user',
            'is_verified'=> '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
    }
}
