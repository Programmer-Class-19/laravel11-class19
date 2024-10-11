<?php

namespace Database\Factories;

use App\Models\Masjid;
use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    protected $model = Kegiatan::class;

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'nama' => $this->faker->sentence,
            'tanggal' => $this->faker->date(),
            'waktu_mulai' => $this->faker->time(),
            'waktu_selesai' => $this->faker->time(),
            'masjid_id' => Masjid::factory(),  // Relasi ke Masjid
        ];
    }
}
