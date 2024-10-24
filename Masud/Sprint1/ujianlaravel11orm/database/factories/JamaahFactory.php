<?php

namespace Database\Factories;

use App\Models\Jamaah;
use App\Models\Masjid;
use Illuminate\Database\Eloquent\Factories\Factory;

class JamaahFactory extends Factory
{
    protected $model = Jamaah::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,  // Nama jamaah secara acak
            'alamat_kota' => $this->faker->city,  // Kota secara acak
            'jumlah_donasi' => $this->faker->randomFloat(2, 50, 1000),  // Donasi secara acak
            'tanggal_lahir' => $this->faker->date(),  // Tanggal lahir secara acak
            'masjid_id' => Masjid::factory(),  // Masjid ID akan dikaitkan dengan data dari Masjid
        ];
    }
}