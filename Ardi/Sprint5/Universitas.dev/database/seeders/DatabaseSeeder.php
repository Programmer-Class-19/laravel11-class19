<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Seminar;
use App\Models\Universitas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
            
        // ]);

        Universitas::factory(10)->create()->each(function ($university) {
            Mahasiswa::factory(10)->create(['university_id' => $university->id]);
            Seminar::factory(5)->create(['university_id' => $university->id]);
        });
    }
}
