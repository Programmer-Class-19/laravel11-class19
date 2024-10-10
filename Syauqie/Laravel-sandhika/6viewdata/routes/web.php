<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page', 'titles' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'titles' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'titles' => 'Blog', 'posts' => [
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
    ]]);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts =  [
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

    $post = Arr::first($posts, function($post) use ($slug){
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post','titles' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page', 'titles' => 'Contact']);
});
