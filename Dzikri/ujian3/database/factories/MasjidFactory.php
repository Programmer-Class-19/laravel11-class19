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
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            'kapasitas' => $this->faker->numberBetween(100,1000),
            'rekening_donasi' => $this->faker->bankAccountNumber,
        ];
    }
}
