<?php

namespace Database\Seeders;

use App\Models\Santri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SantriSeeder extends Seeder
{
    public function run()
    {
        Santri::factory()->count(30)->create(); // Buat 30 santri
    }
}
