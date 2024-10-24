<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jamaah;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jamaah>
 */
class JamaahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'alamat_kota' => $this->faker->city,
            'jumlah_donasi' => $this->faker->numberBetween(0, 1000000),
            'tanggal_lahir' => $this->faker->date,
            'masjid_id' => \App\Models\Masjid::factory(),
        ];
    }
}
