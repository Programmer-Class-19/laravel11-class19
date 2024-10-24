<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page', 'titles' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'titles' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'titles' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{slug}', function ($slug) {

    $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'titles' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page', 'titles' => 'Contact']);
});
