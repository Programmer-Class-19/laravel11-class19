<?php

namespace Database\Factories;

use App\Models\Jamaah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jamaah>
 */
class JamaahFactory extends Factory
{
    protected $model = Jamaah::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'kota' => $this->faker->city,
            'jumlah_donasi' => $this->faker->randomFloat(2,100,1000),
            'tanggal_lahir' => $this->faker->date,
            'masjid_id' => \App\Models\Masjid::inRandomOrder()->first()->id
        ];
    }
}
