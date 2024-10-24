<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Universitas>
 */
class UniversitasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            'kota' => $this->faker->city,
            'kapasitas' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
