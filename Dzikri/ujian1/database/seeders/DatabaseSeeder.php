<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jamaah;
use App\Models\Masjid;
use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();
        
    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    public function run()
{
    Masjid::factory(10)->create();
    Jamaah::factory(50)->create();
    Kegiatan::factory(20)->create()->each(function ($kegiatan) {
        $jamaah = Jamaah::inRandomOrder()->take(rand(1, 10))->get();
        $kegiatan->jamaah()->attach($jamaah);
    });
}
}
