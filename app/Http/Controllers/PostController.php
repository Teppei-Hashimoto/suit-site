<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user'])->get();
        return view('blog.posts',[
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);

        $request->user()->posts()->create($request->only(['title', 'content']));

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('posts.index');

    }

    public function destroy(Post $post)
    {
        // $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
