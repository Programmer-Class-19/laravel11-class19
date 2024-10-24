<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masjid>
 */
class MasjidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        
        'name' => $this->faker->company,
        'address' => $this->faker->address,
        'donation_total' => $this->faker->randomFloat(2, 100, 10000),
        'capacity' => $this->faker->numberBetween(50, 1000),
    ];
        
    }
}
