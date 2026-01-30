<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'destination_id' => \App\Models\Destination::factory(),
            'experience_id' => \App\Models\Experience::factory(),
            'booking_date' => $this->faker->dateTimeBetween('+1 week', '+6 months'),
            'guests' => $this->faker->numberBetween(1, 5),
            'total_price' => $this->faker->randomFloat(2, 1000, 10000),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
