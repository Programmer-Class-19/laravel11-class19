<?php

namespace Database\Seeders;

use App\Models\Jamaah;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JamaahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jamaah::factory()->count(100)->create();

        $this->call(JamaahSeeder::class);
    }
}
