<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Community::create([
            'name' => 'Komunitas Minecraft Indonesia',
            'event' => 'Turnamen Build',
            'news' => 'Turnamen akan dilaksanakan pada bulan depan',
            'info' => 'Semua pemain diundang untuk berpartisipasi',
            'event_time' => now(),
            'date' => now()->toDateString(),
            'activities' => 'Diskusi dan permainan bersama'
        ]);

        Community::create([
            'name' => 'Komunitas Minecraft Jaktim',
            'event' => 'Turnamen PVP',
            'news' => 'Turnamen akan dilaksanakan pada bulan depan',
            'info' => 'Semua pemain diundang untuk berpartisipasi',
            'event_time' => now(),
            'date' => now()->toDateString(),
            'activities' => 'Diskusi dan permainan bersama'
        ]);
    }
}
