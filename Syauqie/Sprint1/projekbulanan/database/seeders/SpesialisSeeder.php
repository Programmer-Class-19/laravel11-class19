<?php

namespace Database\Seeders;

use App\Models\Spesialis;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpesialisSeeder extends Seeder
{
    public function run()
    {
        Spesialis::factory()->create(); // Buat 5 spesialis
    }
}
