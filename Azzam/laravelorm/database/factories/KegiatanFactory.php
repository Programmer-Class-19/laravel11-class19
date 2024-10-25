<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use App\Models\Masjid;
use Illuminate\Database\Eloquent\Factories\Factory;

class KegiatanFactory extends Factory
{
    protected $model = Kegiatan::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->sentence(3),  // Nama kegiatan acak
            'tanggal' => $this->faker->date(),  // Tanggal kegiatan acak
            'waktu_mulai' => $this->faker->time(),  // Waktu mulai kegiatan
            'waktu_selesai' => $this->faker->time(),  // Waktu selesai kegiatan
            'masjid_id' => Masjid::factory(),  // Masjid ID akan dikaitkan dengan data dari Masjid
        ];
    }
}

