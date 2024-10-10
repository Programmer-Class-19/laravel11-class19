<?php
namespace Database\Seeders;

use App\Models\Jamaah;
use Illuminate\Database\Seeder;

class JamaahSeeder extends Seeder
{
    public function run()
    {
        Jamaah::factory(500)->create(); // Membuat 100 data jamaah
    }
}

