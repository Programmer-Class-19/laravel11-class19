<?php
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'headerTitle' => 'Home Page',
        'titles' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'headerTitle' => 'About Page',
        'name' => 'Syauqie Billah',
        'titles' => 'About'
    ]);
});

Route::get('/posts', function () {
    return view('posts', [
        'headerTitle' => 'Blog',
        'titles' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'headerTitle' => 'Single Post',
        'title' => 'Single Post',
        'post' => $post
    ]);
});

Route::get('/authors/{user}', function (User $user) {
    return view('posts', [
        'titles' => 'Article',
        'headerTitle' => 'Article by ' . $user->name,
        'posts' => $user->posts
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'headerTitle' => 'Contact Page',
        'titles' => 'Contact'
    ]);
});
