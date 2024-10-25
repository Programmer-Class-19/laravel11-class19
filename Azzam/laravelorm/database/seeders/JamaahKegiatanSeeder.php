<?php

namespace Database\Seeders;

use App\Models\Jamaah;
use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class JamaahKegiatanSeeder extends Seeder
{
    public function run()
    {
        // Mengambil semua jamaah dan kegiatan
        $jamaahs = Jamaah::all();
        $kegiatans = Kegiatan::all();

        // Looping melalui setiap jamaah dan kaitkan mereka ke kegiatan secara acak
        foreach ($jamaahs as $jamaah) {
            // Setiap jamaah akan terlibat dalam 1 sampai 3 kegiatan secara acak
            $randomKegiatans = $kegiatans->random(rand(1, 3));
            
            foreach ($randomKegiatans as $kegiatan) {
                // Masukkan data ke tabel pivot jamaah_kegiatan
                $jamaah->kegiatans()->attach($kegiatan->id);
            }
        }
    }
}
