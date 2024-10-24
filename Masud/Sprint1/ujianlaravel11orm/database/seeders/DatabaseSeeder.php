<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Masjid;
use App\Models\Jamaah;
use App\Models\Kegiatan;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Membuat 15 masjid
            Masjid::factory(15)->create()->each(function ($masjid) {

        // Membuat 20 jamaah untuk setiap masjid
            Jamaah::factory(20)->create(['masjid_id' => $masjid->id]);

        // Membuat 5 kegiatan untuk setiap masjid
            Kegiatan::factory(5)->create(['masjid_id' => $masjid->id]);

        //
            $this->call([
                JamaahKegiatanSeeder::class,  // Seeder untuk tabel pivot jamaah_kegiatan
            ]);
        });
    }
}