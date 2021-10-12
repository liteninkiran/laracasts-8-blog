<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    $posts = Post::latest('published_at')->with('category', 'author');

    if (request('search')) {
        $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
    }

    $posts = $posts->get();

    $categories = Category::orderBy('name')->get();
    return view('posts', compact('posts', 'categories'));
})->name('home');

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post',  compact('post'));
});

Route::get('categories/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load(['category', 'author']);
    $posts = Post::query()
        ->latest('published_at')
        ->with('category', 'author')
        ->where('category_id', '=', $category->id)
        ->get();
    $categories = Category::orderBy('name')->get();
    return view('posts',  compact('posts', 'categories', 'category'));
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    $posts = Post::query()
        ->latest('published_at')
        ->with('category', 'author')
        ->where('user_id', '=', $author->id)
        ->get();
    $categories = Category::orderBy('name')->get();
    return view('posts',  compact('posts', 'categories'));
});
