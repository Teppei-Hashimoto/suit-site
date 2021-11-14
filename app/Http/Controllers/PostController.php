<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }

    public function index()
    {
        return view('blog.newpost');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);

        $request->user()->posts()->create($request->only(['title', 'content']));

        return redirect()->route('posts');
    }
}
