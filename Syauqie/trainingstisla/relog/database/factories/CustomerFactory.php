<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_member' => fake()->unique()->bothify('USR-######???'),
            'nama_member' => fake()->name(),
            'email_member' => fake()->unique()->freeEmail(),
            'phone_member' => fake()->unique()->phoneNumber(),
            'address_member' => fake()->address()
        ];
    }
}
