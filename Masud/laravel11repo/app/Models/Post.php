<?php 

namespace App\Models;

use Illuminate\Support\Arr;

class Post 
{
    public static function all()  // untuk menampilkan seluruh data postingan 
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-arikel-1',
                'title' => 'Judul Artikel 1',
                'author' => "Mas'ud Maungzyy",
                'body' => '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi omnis dolor optio beatae magni, minus facilis laudantium est delectus inventore quos necessitatibus quis nostrum explicabo ipsum labore. Sunt, vitae repudiandae!',
                'image' => '/img/Dualsense Wallpaper ✖️.jpeg'
            ],
            [
                'id' => 2,
                'slug' => 'judul-arikel-2',
                'title' => 'Judul Artikel 2',
                'author' => "Mas'ud Maungzyy",
                'body' => '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt alias sunt architecto voluptate pariatur quas recusandae doloribus, excepturi cupiditate. Dolore ad doloremque aspernatur ipsa est sed? Dolor dolores beatae praesentium.',
                'image' => '/img/download.jpeg'
            ]   
            
            ];
    }

    public static function find($slug): array
    {
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] == $slug;
        // });

        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        if ( ! $post) {
            abort(404);
        }

        return $post;

    }

}