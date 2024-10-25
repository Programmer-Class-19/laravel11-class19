<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       $dzikri = User::create([
            'name' => 'Dzikri Rabbani',
            'username' => 'Adzri',
            'email' => 'adzri@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' =>  Str::random(10)
        ]);

        Post::factory(100)->recycle([
            Category::factory(3)->create(),
            $dzikri
            User::factory(5)->create(),
        ])->create();
    }
}
