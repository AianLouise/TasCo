<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Factories\ServiceFactory;
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

        Category::create([
            'name' => 'Plumbing Services',
            'description' => 'Professional plumbing services for repairs, installations, and maintenance.',
        ]);
        
        Category::create([
            'name' => 'IT Consulting',
            'description' => 'Expert IT consulting services for businesses, including system analysis and software development.',
        ]);
        
        Category::create([
            'name' => 'Home Cleaning',
            'description' => 'Comprehensive home cleaning services, including regular cleaning and deep cleaning.',
        ]);

        // Create a worker user1
        $worker = User::factory()->create([
            'name' => 'Elijah Farrell',
            'email' => 'worker@example.com',
            'role' => 'worker',
            'is_verified' => '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create services associated with the worker user
        Service::factory()
        ->count(1)
        ->create([
            'provider_id' => $worker->id,
            'category_id' => 1, // Replace with the actual category_id
            // Add other fields as needed
        ]);

        // Create a worker user2
        $worker = User::factory()->create([
            'name' => 'Wayne Harding',
            'email' => 'worker2@example.com',
            'role' => 'worker',
            'is_verified' => '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        Service::factory()
        ->count(1)
        ->create([
            'provider_id' => $worker->id,
            'category_id' => 2, // Replace with the actual category_id
            // Add other fields as needed
        ]);

        // Create a worker user3
        $worker = User::factory()->create([
            'name' => 'Astra Burch',
            'email' => 'worker3@example.com',
            'role' => 'worker',
            'is_verified' => '1',
            'address' => 'Ph',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        Service::factory()
        ->count(1)
        ->create([
            'provider_id' => $worker->id,
            'category_id' => 3, // Replace with the actual category_id
            // Add other fields as needed
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
