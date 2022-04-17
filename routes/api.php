<?php

use App\Http\Controllers\CategoryApi;
use App\Http\Controllers\CommentApi;
use App\Http\Controllers\PostApi;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// posts api routes 
Route::get('posts', [PostApi::class, 'posts']);
Route::get('posts/{id}', [PostApi::class, 'post']);
Route::post('posts', [PostApi::class, 'storePost']);
Route::put('posts/{id}', [PostApi::class, 'updatePost']);
Route::delete('posts/{id}', [PostApi::class, 'deletePost']);

// categories api routes 
Route::get('categories', [CategoryApi::class, 'index']);
Route::get('category/{id}', [CategoryApi::class, 'show']);
Route::post('categories', [CategoryApi::class, 'store']);
Route::put('categories/{id}', [CategoryApi::class, 'update']);
Route::delete('categories/{id}', [CategoryApi::class, 'delete']);


// comments api routes 
Route::get('comments', [CommentApi::class, 'index']);
Route::get('comments/{id}', [CommentApi::class, 'show']);
Route::post('comments', [CommentApi::class, 'store']);
Route::put('comments/{id}', [CommentApi::class, 'update']);
Route::delete('comments/{id}', [CommentApi::class, 'delete']);
