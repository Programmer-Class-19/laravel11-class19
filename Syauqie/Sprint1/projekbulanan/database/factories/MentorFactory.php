<?php

namespace Database\Factories;

use App\Models\Mentor;
use App\Models\Spesialis;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
{
    protected $model = Mentor::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'spesialis_id' => \App\Models\Spesialis::factory(), // relasi dengan spesialis
        ];
    }
}
