<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city() . ' Luxury Resort',
            'description' => $this->faker->paragraph(),
            'base_price' => $this->faker->randomFloat(2, 500, 5000),
            'image_url' => 'https://picsum.photos/seed/' . rand(1, 1000) . '/800/600',
        ];
    }
}
