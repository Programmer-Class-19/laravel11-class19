<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

Route::get('/authors/{user:username}', function(User $user) {
    
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => 
    $user->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Me']);
});

