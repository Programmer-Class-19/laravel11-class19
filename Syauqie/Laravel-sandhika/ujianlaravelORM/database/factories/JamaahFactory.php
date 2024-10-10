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
        // Mengambil satu masjid secara acak dari yang ada
        $masjid = Masjid::inRandomOrder()->first();

        return [
            'nama' => $this->faker->name,
            'alamat_kota' => $this->faker->city,
            'jumlah_donasi' => $this->faker->randomFloat(2, 0, 1000),
            'tanggal_lahir' => $this->faker->date,
            // Jika tidak ada masjid, masjid_id harus null atau gunakan ID masjid secara langsung
            'masjid_id' => $masjid ? $masjid->id : null,
        ];
    }
}

