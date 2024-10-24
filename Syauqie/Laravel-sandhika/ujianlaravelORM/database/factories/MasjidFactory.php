<?php
namespace Database\Factories;

use App\Models\Masjid;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasjidFactory extends Factory
{
    protected $model = Masjid::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->company . ' Masjid',
            'alamat' => $this->faker->address,
            'jumlah_rek_donasi' => $this->faker->randomFloat(2, 0, 1000000),
            'kapasitas' => $this->faker->numberBetween(50, 500),
        ];
    }
}

