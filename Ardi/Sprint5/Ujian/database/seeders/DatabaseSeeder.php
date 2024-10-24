<?php

namespace Database\Seeders;

use App\Models\Masjid;
use App\Models\Jamaah;
use App\Models\Kegiatan;
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
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Masjid::factory(10)->create()->each(function ($masjid) {
            Jamaah::factory(10)->create(['masjid_id' => $masjid->id]);
            Kegiatan::factory(5)->create(['masjid_id' => $masjid->id]);
        });
    }
}
