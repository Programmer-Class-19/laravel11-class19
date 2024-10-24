<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Update;

class UpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Update::create([
            'name' => 'Tricky Trials Update',
            'version' => '1.21.0',
            'features' => 'Fitur baru, item baru, dan mobs baru',
            'structures' => 'Trial Chambers',
            'biomes' => 'Tidak Ada Penambahan Biome',
            'items' => 'Mace, bahan bangunan, enchantments',
            'mobs' => 'Bogged, Brezee'
        ]);
    }
}
