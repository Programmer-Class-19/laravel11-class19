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
            'nama' => $this->faker->company . ' Masjid',  // Nama masjid random
            'alamat' => $this->faker->address,  // Alamat random
            'jumlah_rekening_donasi' => $this->faker->numberBetween(100, 5000),  // Jumlah donasi secara acak
            'kapasitas' => $this->faker->numberBetween(100, 500),  // Kapasitas sebuah masjid
        ];
    }

}   

