<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name'=>'Handphone', 'harga'=>1000000]);
        Category::create(['name'=>'Topi', 'harga'=>25000]);
        Category::create(['name'=>'Baju', 'harga'=>15000]);
    }
}
