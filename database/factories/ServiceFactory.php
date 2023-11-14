<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random category ID
        $category_id = Category::inRandomOrder()->first()->id;

        // Get a random user ID with the 'worker' role
        $provider_id = User::where('role', 'worker')->inRandomOrder()->first()->id;

        // Define how your Service model should be populated with fake data.
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'category_id' => $category_id,
            'provider_id' => $provider_id,
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
