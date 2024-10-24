<?php

use App\Models\Category;
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
    // $posts = Post::with('author', 'category')->latest()->get();
    $posts = Post::latest()->get();
    return view('posts', ['title' => 'Blog Minecraft', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Singel Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function(User $user) {
    // $posts = $user->posts->load('category', 'author');
    return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => 
    $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    // $posts = $category->posts->load('category', 'author');
    return view('posts', ['title' => ' Articles by: ' . $category->name, 'posts' => 
    $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Me']);
});

