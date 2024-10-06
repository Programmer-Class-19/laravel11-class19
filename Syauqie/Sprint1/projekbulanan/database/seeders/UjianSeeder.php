<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjianSeeder extends Seeder
{
    public function run()
    {
        Ujian::factory()->count(30)->create(); // Buat 50 ujian
    }
}
