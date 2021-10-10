<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    DB::listen(function($query) {
        logger($query->sql);
    });
    $posts = Post::with('category')->get();
    return view('posts', compact('posts'));
});

Route::get('posts/{post:slug}', function (Post $post) {
    DB::listen(function($query) {
        logger($query->sql);
    });
    return view('post',  compact('post'));
});

Route::get('categories/{category:slug}', function (Category $category) {
    DB::listen(function($query) {
        logger($query->sql);
    });
    return view('posts',  ['posts' => $category->posts]);
});
