<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApi extends Controller
{
    // get all posts 
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
    // get all single post 
    public function show(Category $id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }
    // *store post
    public function store(Request $request)
    {
        $this->validations($request);
    }
    // validations types
    public function validations($request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:10|max:15000',
        ]);
        $category =  Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return response()->json($category);
    }
}
