<?php

namespace Database\Seeders;

use App\Models\Mentor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MentorSeeder extends Seeder
{
    public function run()
    {
        Mentor::factory()->count(4)->create(); // Buat 5 mentor
    }
}
