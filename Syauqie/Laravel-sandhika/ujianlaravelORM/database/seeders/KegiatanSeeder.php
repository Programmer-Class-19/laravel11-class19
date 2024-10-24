<?php
namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        Kegiatan::factory(300)->create(); // Membuat 20 data kegiatan
    }
}

