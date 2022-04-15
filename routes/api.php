<?php

use App\Http\Controllers\CategoryApi;
use App\Http\Controllers\PostApi;
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
Route::get('post/{id}', [PostApi::class, 'post']);
Route::post('posts', [PostApi::class, 'storePost']);

// categories api routes 
Route::get('categories', [CategoryApi::class, 'index']);
Route::get('category/{id}', [CategoryApi::class, 'show']);
Route::post('categories', [CategoryApi::class, 'store']);
