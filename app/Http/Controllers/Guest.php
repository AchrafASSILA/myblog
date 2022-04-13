<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guest extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('blog.home', compact('posts'));
    }
    public function getPost($id)
    {
        $post = Post::find($id);
        return view('blog.single-post', compact('post'));
    }
}
