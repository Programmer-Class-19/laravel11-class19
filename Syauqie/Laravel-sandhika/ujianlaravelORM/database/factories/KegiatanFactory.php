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
        $masjid = Masjid::inRandomOrder()->first();

        return [
            'nama' => $this->faker->sentence(3),
            'tanggal' => $this->faker->date(),
            'waktu_mulai' => $this->faker->time(),
            'waktu_selesai' => $this->faker->time(),
            'masjid_id' => $masjid ? $masjid->id : null, // Membuat masjid baru secara otomatis
        ];
    }
}

