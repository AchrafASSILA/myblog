<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CommentApi extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }
    public function show($id)
    {
        $comment = Comment::find($id);
        return response()->json($comment);
    }
    public function store(Request $request)
    {
        $this->validations($request);
        $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'website' => $request->website,
            'post_id' => $request->post_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return response()->json($comment);
    }
    // update data 
    public function update(Request $request, $id)
    {
        $this->validations($request);
        $comment = Comment::find($id);
        $comment->update([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'website' => $request->website,
            'post_id' => $request->post_id,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return response()->json($comment);
    }
    // delete comment 
    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json([
            'success' => 'comment was deleted'
        ]);
    }
    // validations types
    public function validations($request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'comment' => 'required|min:5|max:1000',
            'email' => 'required|min:5|max:500',
        ]);
    }
}
