<?php

use App\Http\Controllers\Admin;
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

Route::get('/', function () {
    return view('welcome');
});



// admin routes 
Route::get('home', [Admin::class, 'index'])->name('admin.home')->middleware('auth');
Route::get('posts', [Admin::class, 'posts'])->name('admin.posts')->middleware('auth');
Route::get('create-post', [Admin::class, 'createPost'])->name('admin.createPost')->middleware('auth');
Route::post('store-post', [Admin::class, 'storePost'])->name('admin.storePost')->middleware('auth');
Route::get('edit-post/{id}', [Admin::class, 'editPost'])->name('admin.editPost')->middleware('auth');
Route::put('update-data/{id}', [Admin::class, 'updatePost'])->name('admin.updatePost')->middleware('auth');
Route::delete('delete-post/{id}', [Admin::class, 'deletePost'])->name('admin.deletePost')->middleware('auth');


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
