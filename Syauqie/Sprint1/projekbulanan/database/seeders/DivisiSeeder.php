<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisiSeeder extends Seeder
{
    public function run()
    {
        Divisi::factory()->create(); // Buat 10 divisi
    }
}
