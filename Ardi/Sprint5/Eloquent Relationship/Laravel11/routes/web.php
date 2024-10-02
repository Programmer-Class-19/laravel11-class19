<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name'=> 'Ardi Juni Yansyah', 'title' => 'About Me']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog Minecraft', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function(Post $post) {
    
    return view('post', ['title' => 'Singel Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Me']);
});

