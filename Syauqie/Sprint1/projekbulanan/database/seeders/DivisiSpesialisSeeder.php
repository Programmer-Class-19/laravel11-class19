<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisiSpesialisSeeder extends Seeder
{
    public function run()
    {
        DB::table('divisi_spesialis')->insert([
            ['divisi_id' => 1, 'spesialis_id' => 1],
            ['divisi_id' => 1, 'spesialis_id' => 2],
            ['divisi_id' => 2, 'spesialis_id' => 2],
            ['divisi_id' => 3, 'spesialis_id' => 3],
        ]);
    }
}
