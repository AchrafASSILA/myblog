<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostApi extends Controller
{
    // get all posts 
    public function posts()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
    // get all single post 
    public function post($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }
    // *store post
    public function storePost(Request $request)
    {
        $this->validations($request);
    }
    public function updatePost($id, Request $request)
    {
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return response()->json($post);
    }
    // delete post 
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json([
            'success' => 'post was deleted'
        ]);
    }
    // validations types
    public function validations($request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'body' => 'required|min:10|max:15000',
        ]);
    }
}
