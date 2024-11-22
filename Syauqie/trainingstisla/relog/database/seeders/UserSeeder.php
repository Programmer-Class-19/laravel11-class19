<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'syauqie',
            'email' => 'syauqiebillah13@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'radit',
            'email' => 'raditbillah13@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $kasir->assignRole('kasir');
    }
}
