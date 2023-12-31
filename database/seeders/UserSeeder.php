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
            'first_name' => 'TasCo',
            'last_name' => 'Administrator',
            'name' => 'TasCo Administrator',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'phone' => '09876543212',
            'address' => 'Sample Barangay, Pampanga, Philippines',
            'messenger_color' => '#2180f3',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        $categories = [
            [
                'name' => 'Plumbing Services',
                'description' => 'Professional plumbing services for repairs, installations, and maintenance.',
            ],
            [
                'name' => 'IT Consulting',
                'description' => 'Expert IT consulting services for businesses, including system analysis and software development.',
            ],
            [
                'name' => 'Home Cleaning',
                'description' => 'Comprehensive home cleaning services, including regular cleaning and deep cleaning.',
            ],
            [
                'name' => 'Laundry',
                'description' => 'Laundry services for clean and fresh clothes.',
            ],
            [
                'name' => 'Bathroom Cleaning',
                'description' => 'Thorough cleaning services for bathrooms.',
            ],
            [
                'name' => 'Meal Preparation',
                'description' => 'Meal preparation services for delicious and nutritious meals.',
            ],
            [
                'name' => 'Home Improvement',
                'description' => 'Services for enhancing and improving the home.',
            ],
            [
                'name' => 'Cleaning',
                'description' => 'General cleaning services for various spaces.',
            ],
            [
                'name' => 'Kitchen Tasks',
                'description' => 'Assistance with various kitchen-related tasks.',
            ],
            [
                'name' => 'Outdoor Chores',
                'description' => 'Services for outdoor chores and maintenance.',
            ],
            [
                'name' => 'Maintenance Tasks',
                'description' => 'General maintenance services for different tasks.',
            ],
            [
                'name' => 'Construction and Maintenance',
                'description' => 'Construction and maintenance services for buildings and structures.',
            ],
            // Add more categories as needed
        ];

        // Insert the data into the categories table
        Category::insert($categories);

        // Create a worker1
        $worker = User::factory()->create([
            'first_name' => 'Elijah',
            'last_name' => 'Farrell',
            'name' => 'Elijah Farrell',
            'phone' => '09876543212',
            'email' => 'worker@example.com',
            'role' => 'worker',
            'is_verified' => '1',
            'category_id' => '2',
            'messenger_color' => '#2180f3',
            'address' => 'Cabalantian, Bacolor, Pampanga',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a worker2
        $worker = User::factory()->create([
            'first_name' => 'Wayne',
            'last_name' => 'Harding',
            'name' => 'Wayne Harding',
            'phone' => '09876543212',
            'email' => 'worker2@example.com',
            'role' => 'worker',
            'is_verified' => '1',
            'category_id' => '1',
            'messenger_color' => '#2180f3',
            'address' => 'Cabambangan, Bacolor, Pampanga',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a worker3
        $worker = User::factory()->create([
            'first_name' => 'Astra',
            'last_name' => 'Burch',
            'name' => 'Astra Burch',
            'phone' => '09876543212',
            'email' => 'worker3@example.com',
            'role' => 'worker',
            'is_verified' => '1',
            'category_id' => '3',
            'messenger_color' => '#2180f3',
            'address' => 'Cabetican, Bacolor, Pampanga',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create a regular user
        User::factory()->create([
            'first_name' => 'Audra',
            'last_name' => 'Mcneil',
            'name' => 'Audra Mcneil',
            'phone' => '09876543212',
            'email' => 'user@example.com',
            'role' => 'user',
            'is_verified' => '1',
            'messenger_color' => '#2180f3',
            'address' => 'Cabalantian, Bacolor, Pampanga',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create another regular user
        User::factory()->create([
            'first_name' => 'Iliana',
            'last_name' => 'Mooney',
            'name' => 'Iliana Mooney',
            'phone' => '09876543212',
            'email' => 'user2@example.com',
            'role' => 'user',
            'is_verified' => '1',
            'messenger_color' => '#2180f3',
            'address' => 'Cabambangan, Bacolor, Pampanga',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);

        // Create another regular user
        User::factory()->create([
            'first_name' => 'Arsenio',
            'last_name' => 'Horne',
            'name' => 'Arsenio Horne',
            'phone' => '09876543212',
            'email' => 'user3@example.com',
            'role' => 'user',
            'is_verified' => '1',
            'messenger_color' => '#2180f3',
            'address' => 'Cabetican, Bacolor, Pampanga',
            'password' => bcrypt('12345678'), // You can set a password here
        ]);
    }
}
