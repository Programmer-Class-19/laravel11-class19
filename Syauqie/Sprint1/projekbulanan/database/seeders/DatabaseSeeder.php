<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Panggil seeder lain untuk dijalankan
        $this->call([
            DivisiSeeder::class,
            SpesialisSeeder::class,
            SantriSeeder::class,
            MentorSeeder::class,
            UjianSeeder::class,
        ]);
    }
}
