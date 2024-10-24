<?php

use App\Models\Post;
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
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});


Route::get('/posts/{post:slug}', function(post $post) {

     
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
    