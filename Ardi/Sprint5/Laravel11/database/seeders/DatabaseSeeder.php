<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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


        // Category::create([
        //     'name' => 'Backend Developer',
        //     'slug' => 'Backend_Developer'
        // ]);

        // Post::create([
        //     'title' => 'Obsesi',
        //     'author_id' => '1',
        //     'category_id' => '1',
        //     'slug' => 'obsesi',
        //     'body' => 'Fenomena keputusasaan orang tua dengan antusiasme/obsesi/kecanduan anak-anak mereka terhadap Minecraft tidak asing lagi
        //      Dalam berbagai tulisan dan artikel online, mereka mengeluh bahwa permainan ini mengambil alih kehidupan anak-anak mereka. Pekerjaan rumah, tugas, dan tidur pun diabaikan asal bisa terus bermain
        //      Hal ini menyebabkan beberapa orang tua melarang atau membatasi waktu bermain Minecraft
        //      Seorang ayah, menjelaskan keputusannya untuk membatasi jam main putra kembarnya karena, "Minecraft, seperti semua game adiktif lainnya, tidak ada habisnya. Sedangkan masa kanak-kanak kedua putra saya ada batasnya. Saya ingin mereka belajar tentang dunia nyata, bukan dunia yang virtual
        //      Namun beberapa orang tua lainnya tidak keberatan melihat anak-anak mereka bermain game itu - setidaknya mereka melakukan sesuatu agak kreatif
        //      Tapi mereka juga kebingungan melihat anak menghabiskan berjam-jam menonton orang lain bermain Minecraft. Itu mereka anggap obsesi tingkat tinggi'
        // ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
