<?php

use App\Http\Controllers\ContactUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

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
Route::get('/contact-us', [ContactUs::class, 'index'])->name('contact-us');



/**
 * @uses Routes for Forum/Post controller
 */

// To edit posts
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::put('/posts/{id}/edit', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// To Delete posts
Route::delete('/forum/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

/** 
 * @return forum page 
 * */
Route::get('/forum', [ForumController::class, 'index'])->name('forum');

Route::match(['GET', 'POST'], '/posts', [PostController::class, 'store'])->name('posts.store');
Route::match(['GET', 'POST'], '/comments', [CommentController::class, 'store'])->name('comment.store');
Route::get('/forum/comments/{id}', [CommentController::class, 'index'])->name('comment');
Route::put('/like', [PostController::class, 'like'])->name('posts.like');
Route::put('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
