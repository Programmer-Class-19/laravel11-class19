<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post  
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'judul Artikel 1',
                'author' => 'Adzri Rabbani',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio pariatur sint iusto labore, itaque blanditiis vero delectus eum debitis enim in. Repellat, quo quia doloribus amet atque mollitia corrupti assumenda.'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'judul Artikel 2',
                'author' => 'Adzri Rabbani',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt tempora sapiente, quae nesciunt unde asperiores amet sunt tenetur error exercitationem laudantium aut. Sequi, magni voluptatum optio deleniti dolores nam mollitia.'
            ],
        ];
    }

    public static function find($slug): array
    {

     $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

     if (!$post) {
        abort(404);
     }

     return $post;
    }
} 
