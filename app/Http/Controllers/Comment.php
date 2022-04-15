<?php

namespace App\Http\Controllers;

use App\Models\Comment as ModelsComment;
use App\Models\Post;
use Illuminate\Http\Request;

class Comment extends Controller
{
    // store comment in db 
    public function storeComment(Request $request, $id)
    {
        $this->validations($request);
        ModelsComment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'website' => $request->website,
            'post_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('blog.single-post', $id)->with([
            'success' => 'commment was added'
        ]);
    }
    // validations types
    public function validations($request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'comment' => 'required|min:10|max:1000',
            'email' => 'required|min:10|max:500',
        ]);
    }
}
