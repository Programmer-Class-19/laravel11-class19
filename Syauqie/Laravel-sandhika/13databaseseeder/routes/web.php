<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Carbon;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page', 'titles' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page'], ['name' => 'Syauqie Billah', 'titles' => 'about']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'titles' => 'Blog',
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page', 'titles' => 'Contact']);
});
