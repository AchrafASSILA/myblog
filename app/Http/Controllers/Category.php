<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Database\Events\ModelsPruned;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function categories()
    {
        $categories = ModelsCategory::paginate(3);
        return view('admin.categories', compact('categories'));
    }
    // return create view 
    public function createCategory()
    {
        return view('admin.createCategory');
    }
    // store data 
    public function storeCategory(Request $request)
    {
        $this->validations($request);
        ModelsCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('admin.categories')->with([
            'success' => 'category was added'
        ]);
    }
    //show edit category 
    public function editCategory($id)
    {
        $category = ModelsCategory::find($id);
        return view('admin.editcategory', compact('category'));
    }
    public function updateCategory($id, Request $request)
    {
        $category = ModelsCategory::find($id);
        $this->validations($request);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('admin.categories')->with([
            'success' => 'category was updated'
        ]);
    }
    // delete post 
    public function deleteCategory($id)
    {
        $category = ModelsCategory::find($id);
        $category->delete();
        return redirect()->route('admin.categories')->with([
            'success' => 'category was deleted'
        ]);
    }
    // validations types
    public function validations($request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'description' => 'required|min:10|max:1000',
        ]);
    }
}
