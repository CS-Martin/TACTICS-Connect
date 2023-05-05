<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;

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

// To load the home page instead of the welcome page -martin
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Available route class
// Route::get();
// Route::put();
// Route::post();
// Route::delete();
// Route::patch();
// Route options();
// Route::redirect();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/forum', [ForumController::class, 'index'])->name('forum');
Route::match(['GET', 'POST'], '/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/create', function () {
    return view('create-post');
});
Route::put('/like', [PostController::class, 'like'])->name('posts.like');
Route::put('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');



Route::resource('posts.comments', CommentController::class)->only([
    'store', 'edit', 'update', 'destroy',
]);
