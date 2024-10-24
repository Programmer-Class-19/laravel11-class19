<?php

namespace Database\Factories;

use App\Models\Masjid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masjid>
 */
class MasjidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Masjid::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            'jumlah_donasi' => $this->faker->numberBetween(0, 10000000),
            'kapasitas' => $this->faker->numberBetween(50, 500),
        ];
    }
}
