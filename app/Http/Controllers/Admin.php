<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class Admin extends Controller
{
    // get home 
    public function index()
    {
        return view('admin.home');
    }
    // get post with pagination 
    public function posts()
    {
        $posts = Post::paginate(3);
        return view('admin.posts', compact('posts'));
    }
    // show form post
    public function createPost()
    {
        $categories = Category::all();
        return view('admin.createPost', compact('categories'));
    }
    // store data 
    public function storePost(Request $request)
    {
        $this->validations($request);
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
        }
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->has('image') ? $image_name : 'default.jpg',
            'category_id' => $request->category,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('admin.posts')->with([
            'success' => 'post was added'
        ]);
    }
    //show edit post 
    public function editPost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.editPost', compact('post', 'categories'));
    }
    public function updatePost($id, Request $request)
    {
        $post = Post::find($id);
        $this->validations($request);
        if ($request->has('image')) {
            $file = $request->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $image_name);
            $post->image = $image_name;
        }
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->has('image') ? $image_name : 'default.jpg',
            'category_id' => $request->category,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('admin.posts')->with([
            'success' => 'post was updated'
        ]);
    }
    // delete post 
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts')->with([
            'success' => 'post was deleted'
        ]);
    }

    // validations types
    public function validations($request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'body' => 'required|min:10',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);
    }
}
