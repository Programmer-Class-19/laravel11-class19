<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{

    use HasFactory;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Makanan',
            'description' => 'Kalo lapar makan makanan'
        ]);

        Category::create([
            'name' => 'Minuman',
            'description' => 'Kalo haus minum minuman'
        ]);

        Category::create([
            'name' => 'Pakaian',
            'description' => 'Kalo ga punya pakaian beli pakaian'
        ]);
    }
}
