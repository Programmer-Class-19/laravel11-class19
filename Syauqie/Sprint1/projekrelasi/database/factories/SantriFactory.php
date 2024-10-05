<?php
namespace Database\Factories;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Factories\Factory;

class SantriFactory extends Factory
{
    protected $model = Santri::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'umur' => $this->faker->numberBetween(10, 15),
            'divisi_id' => 1, // Misalnya Divisi Multimedia
            'angkatan' => 19,
        ];
    }
}

