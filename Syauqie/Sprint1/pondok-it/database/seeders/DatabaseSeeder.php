<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\Divisi;
use App\Models\Mentor;
use App\Models\Spesialis;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Membuat beberapa divisi
    Divisi::create(['nama_divisi' => 'Programmer', 'angkatan' => 19]);
    Divisi::create(['nama_divisi' => 'Designer', 'angkatan' => 19]);
    Divisi::create(['nama_divisi' => 'Multimedia', 'angkatan' => 20]);

    // Membuat beberapa mentor
    Mentor::create(['nama' => 'Asep', 'spesialis' => 'UI/UX']);
    Mentor::create(['nama' => 'Bambang', 'spesialis' => 'Capcut']);

    // Membuat spesialis
    Spesialis::create(['nama_spesialis' => 'Laravel', 'kode_spesialis' => 'LRV####']);
    Spesialis::create(['nama_spesialis' => 'Flutter', 'kode_spesialis' => 'FLT####']);

    // Membuat 30 data santri dengan factory
    Santri::factory(50)->create();
}
}
