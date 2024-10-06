<?php

namespace Database\Factories;

use App\Models\Divisi;
use App\Models\Santri;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    protected $model = Santri::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'umur' => $this->faker->numberBetween(12, 25),
            'angkatan' => $this->faker->numberBetween(17, 22),
            'divisi_id' => \App\Models\Divisi::factory(),
        ];
    }
}
