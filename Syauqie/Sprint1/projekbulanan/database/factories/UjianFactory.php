<?php

namespace Database\Factories;

use App\Models\Ujian;
use App\Models\Santri;
use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ujian>
 */
class UjianFactory extends Factory
{
    protected $model = Ujian::class;

    public function definition()
    {
        return [
            'tanggal' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d'),
            'nilai' => $this->faker->numberBetween(60, 100),
            'santri_id' => \App\Models\Santri::factory(), // relasi dengan santri
            'spesialis_id' => \App\Models\Spesialis::factory(), // relasi dengan spesialis
        ];
    }
}
