<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Category;
use App\Http\Controllers\Comment;
use App\Http\Controllers\Guest;
use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// guests routes 
Route::get('/', [Guest::class, 'index'])->name('blog.home');
Route::get('/blog/{id}', [Guest::class, 'getPost'])->name('blog.single-post');
Route::get('/category/{id}', [Guest::class, 'category'])->name('blog.category');

// posts routes 
Route::get('home', [Admin::class, 'index'])->name('admin.home')->middleware('auth');
Route::get('posts', [Admin::class, 'posts'])->name('admin.posts')->middleware('auth');
Route::get('create-post', [Admin::class, 'createPost'])->name('admin.createPost')->middleware('auth');
Route::post('store-post', [Admin::class, 'storePost'])->name('admin.storePost')->middleware('auth');
Route::get('edit-post/{id}', [Admin::class, 'editPost'])->name('admin.editPost')->middleware('auth');
Route::put('update-data/{id}', [Admin::class, 'updatePost'])->name('admin.updatePost')->middleware('auth');
Route::delete('delete-post/{id}', [Admin::class, 'deletePost'])->name('admin.deletePost')->middleware('auth');


// categories routes 
Route::get('categories', [Category::class, 'categories'])->name('admin.categories')->middleware('auth');
Route::get('create-category', [Category::class, 'createCategory'])->name('admin.createCategory')->middleware('auth');
Route::post('store-category', [Category::class, 'storeCategory'])->name('admin.storeCategory')->middleware('auth');
Route::get('edit-category/{id}', [Category::class, 'editcategory'])->name('admin.editcategory')->middleware('auth');
Route::put('update-category/{id}', [Category::class, 'updateCategory'])->name('admin.updateCategory')->middleware('auth');
Route::delete('delete-category/{id}', [Category::class, 'deleteCategory'])->name('admin.deleteCategory')->middleware('auth');

// comment routes 
Route::post('store-comment/{id}', [Comment::class, 'storeComment'])->name('guest.storeComment');
Route::get('comments', [Comment::class, 'index'])->name('admin.comments')->middleware('auth');
Route::delete('comments{id}', [Comment::class, 'delete'])->name('admin.deleteComment')->middleware('auth');



// profile routes 
Route::get('profile', [Profile::class, 'index'])->name('admin.profile')->middleware('auth');












// logout user 
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');




// auth routes 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
