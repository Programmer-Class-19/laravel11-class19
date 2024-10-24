<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'kota' => $this->faker->city(),
            'jurusan' => $this->faker->word(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => $this->faker->address()
        ];
    }
}
