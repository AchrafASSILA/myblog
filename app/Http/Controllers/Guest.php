<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guest extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::paginate(3);
        return view('blog.home', compact('posts', 'categories'));
    }
    public function getPost($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('blog.single-post', compact('post', 'categories'));
    }
    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $posts = Post::where('category_id', $category->id)->paginate(3);
        return view('blog.category', compact('posts', 'categories', 'category'));
    }
    public function showAbout()
    {
        $categories = Category::all();
        return view('blog.about', compact('categories'));
    }
    public function showContact()
    {
        $categories = Category::all();
        return view('blog.contact', compact('categories'));
    }
}
