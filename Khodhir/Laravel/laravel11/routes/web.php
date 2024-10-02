<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Abu Fayyadh', 'title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'titile' => 'Judul Artikel 1',
            'author' => 'Khodhir',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur commodi eveniet ipsum dolores fuga hic saepe corporis, suscipit facilis rem ab animi mollitia iste voluptatum. Fuga natus soluta optio minus?'

        ],
        [
            'titile' => 'Judul Artikel 2',
            'author' => 'Khodhir',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum veniam consequuntur commodi praesentium nesciunt aliquid, fugit, illum ipsum quibusdam blanditiis corporis explicabo, voluptatem possimus? Voluptatibus, quisquam! Libero, nisi ab. Architecto?. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, hic officiis. Recusandae nobis vero veritatis deserunt, dolorum architecto qui, vel dignissimos corporis ipsam velit nihil temporibus maiores, ullam autem placeat.'

        ]
    ]]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
