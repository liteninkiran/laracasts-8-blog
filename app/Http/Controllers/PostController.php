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
        $posts = $this->getPosts()->paginate(env('PAGINATE_LIMIT'))->withQueryString();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function indexAuthor(User $author) {
        $posts = $this->getPosts();
        $posts = $posts->where('user_id', '=', $author->id)->get();
        return view('posts.index',  compact('posts'));
    }

    protected function getPosts() {
        $posts = Post::latest('published_at')->with('category', 'author')->filter(request(['search', 'category', 'author']));
        return $posts;
    }
}
