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
        // Category::factory(3)->create();
        Category::create([
            'name' => 'Backend Web Developers',
            'slug' => 'backend_web_developers',
        ]);
        
        Category::create([
            'name' => 'Frontend Web Developers',
            'slug' => 'frontend_web_developers',
        ]);

        Category::create([
            'name' => 'Fullstack Web Developers',
            'slug' => 'fullstack_web_developers',
        ]);
        
        Category::create([
            'name' => 'UI/UX',
            'slug' => 'ui/ux',
        ]);

        Category::create([
            'name' => 'Desainer',
            'slug' => 'desainer',
        ]);
    }
}