<?php

namespace Database\Factories;

use App\Models\Divisi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Divisi>
 */
class DivisiFactory extends Factory
{
    protected $model = Divisi::class;

    public function definition()
    {
        return [
            'nama_divisi' => $this->faker->randomElement(['Multimedia', 'Programmer', 'Marketer', 'Customer Service', 'Enterpreneur']),
            'angkatan' => $this->faker->numberBetween(17, 22),
        ];
    }
}
