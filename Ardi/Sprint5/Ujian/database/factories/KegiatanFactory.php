<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kegiatan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word,
            'tanggal' => $this->faker->date,
            'masjid_id' => \App\Models\Masjid::factory(),
            'waktu_mulai' => $this->faker->time,
            'waktu_selesai' => $this->faker->time,

        ];
    }
}
