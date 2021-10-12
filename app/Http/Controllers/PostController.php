<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = $this->getPosts()->get();
        $categories = Category::orderBy('name')->get();
        return view('posts', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        //
    }

    public function indexCategory(Category $category) {
        $posts = $this->getPosts();
        $posts = $posts->where('category_id', '=', $category->id)->get();
        $categories = Category::orderBy('name')->get();
        return view('posts',  compact('posts', 'categories', 'category'));
    }

    public function indexAuthor(User $author) {
        $posts = $this->getPosts();
        $posts = $posts->where('user_id', '=', $author->id)->get();
        $categories = Category::orderBy('name')->get();
        return view('posts',  compact('posts', 'categories'));
    }

    protected function getPosts() {
        $posts = Post::latest('published_at')->with('category', 'author')->filter(request(['search', 'category']));
        return $posts;
    }
}
