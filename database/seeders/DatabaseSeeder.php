<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Destination;
use App\Models\Experience;
use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@luxetravel.com'], // The search criteria
            [
            'name' => 'Admin User',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'user_type' => 'admin',
            ]
        );

        Destination::factory(5)
            ->has(Experience::factory()->count(3))
            ->create();

        Booking::factory(10)->create();
    }
}
