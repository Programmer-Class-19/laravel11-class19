<?php
namespace Database\Seeders;

use App\Models\JamaahKegiatan;
use Illuminate\Database\Seeder;

class JamaahKegiatanSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua jamaah dan kegiatan
        $jamaahs = \App\Models\Jamaah::all();
        $kegiatans = \App\Models\Kegiatan::all();

        // Looping untuk menghubungkan jamaah dan kegiatan
        foreach ($jamaahs as $jamaah) {
            $kegiatanIds = $kegiatans->random(rand(1, 3))->pluck('id'); // Pilih 1 hingga 3 kegiatan secara acak
            $jamaah->kegiatans()->attach($kegiatanIds);
        }
    }
}

