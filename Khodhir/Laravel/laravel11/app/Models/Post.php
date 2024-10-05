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
                'title' => 'Judul Artikel 1',
                'author' => 'Khodhir',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur commodi eveniet ipsum dolores fuga hic saepe corporis, suscipit facilis rem ab animi mollitia iste voluptatum. Fuga natus soluta optio minus?'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Khodhir',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum veniam consequuntur commodi praesentium nesciunt aliquid, fugit, illum ipsum quibusdam blanditiis corporis explicabo, voluptatem possimus? Voluptatibus, quisquam! Libero, nisi ab. Architecto?. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, hic officiis. Recusandae nobis vero veritatis deserunt, dolorum architecto qui, vel dignissimos corporis ipsam velit nihil temporibus maiores, ullam autem placeat.'

            ]
        ];
    }

    public static function find($slug): array
    {
        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if (!$post) {
            abort(404);
        }
        return $post;
    }
}
