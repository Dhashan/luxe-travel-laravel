<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'destination_id' => \App\Models\Destination::factory(),
            'name' => $this->faker->words(3, true),
            'category' => $this->faker->randomElement(['Wellness', 'Adventure', 'Dining']),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'image_url' => 'https://picsum.photos/seed/' . rand(1, 1000) . '/400/300',
        ];
    }
}
