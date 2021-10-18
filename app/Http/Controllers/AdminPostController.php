<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller {
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if ($request->has('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path;
        }

        $data['user_id'] = auth()->id();

        Post::create($data);

        return redirect('/');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        $data = $request->validate([
            'title' => ['required'],
            'thumbnail' => ['image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        if ($request->has('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $path;
        }

        $post->update($data);

        return back()->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->delete();
        return back()->with('success', 'Post deleted');
    }

}
