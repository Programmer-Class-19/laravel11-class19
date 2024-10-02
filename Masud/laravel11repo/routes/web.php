<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome'); 
// });

Route::get('/', function () {
    return view('Home', ['title' => 'Home Page'] );
});


Route::get('/about', function () {
    return view('about', [ 'nama' => "Mas'ud", 'title' => 'About'] );
});


Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-arikel-1',
            'title' => 'Judul Artikel 1',
            'author' => "Mas'ud Maungzyy",
            'body' => '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi omnis dolor optio beatae magni, minus facilis laudantium est delectus inventore quos necessitatibus quis nostrum explicabo ipsum labore. Sunt, vitae repudiandae!'
        ],
        [
            'id' => 2,
            'slug' => 'judul-arikel-2',
            'title' => 'Judul Artikel 2',
            'author' => "Mas'ud Maungzyy",
            'body' => '    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt alias sunt architecto voluptate pariatur quas recusandae doloribus, excepturi cupiditate. Dolore ad doloremque aspernatur ipsa est sed? Dolor dolores beatae praesentium.'
        ]   
        
    ]]);
});


Route::get('/posts/{slug}', function($slug) {
    $posts = [
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

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });
   
    return view('post', ['title' => 'Single Post', 'post' => $post]);

});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
