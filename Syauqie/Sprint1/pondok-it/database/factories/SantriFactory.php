<?php

namespace Database\Factories;

use App\Models\Santri;
use App\Models\Divisi;
use Illuminate\Database\Eloquent\Factories\Factory;

class SantriFactory extends Factory
{
    protected $model = Santri::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'umur' => $this->faker->numberBetween(12, 20),
            'angkatan' => $this->faker->randomElement([19, 20]),
            'divisi_id' => Divisi::inRandomOrder()->first()->id,
        ];
    }
}
