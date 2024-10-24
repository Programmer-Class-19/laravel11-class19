<?php
namespace Database\Seeders;

use App\Models\Masjid;
use Illuminate\Database\Seeder;

class MasjidSeeder extends Seeder
{
    public function run()
    {
        Masjid::factory(50)->create(); // Membuat 10 data masjid
    }
}

