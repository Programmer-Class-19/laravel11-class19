<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MasjidSeeder::class,
            JamaahSeeder::class,
            KegiatanSeeder::class,
            JamaahKegiatanSeeder::class,
        ]);
    }
}

