<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ArticleController extends Controller
{
    public function show($id){
        $post = Post::with('user')->find($id);
        return view('article', [ 'post' => $post ]);
    }
}
