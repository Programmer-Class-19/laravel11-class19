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
        'title' => 'Judul artikel 1',
        'author' => 'Syauqie billah',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eaque nisi autem id, dignissimos consequuntur earum maiores reprehenderit ratione ullam. Exercitationem quo minus minima harum facere quaerat non dolorum animi.'
      ],
      [
        'id' => 2,
        'slug' => 'judul-artikel-2',
        'title' => 'Judul artikel 2',
        'author' => 'Zidan al-farizi',
        'body' => ' Reprehenderit ratione ullam. Exercitationem quo minus minima harum facere quaerat non dolorum animi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime eaque nisi autem id, dignissimos consequuntur earum maiores reprehenderit ratione ullam. Exercitationem quo minus minima harum facere quaerat non dolorum animi.'
      ]
    ];
  }

  public static function find($slug): array
  {
    // return Arr::first(static::all(), function ($post) use ($slug) {
    //   return $post['slug'] == $slug;
    // });
    $post =  Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
    if(! $post) {
      abort(404);
    }

    return $post;
  }
}
