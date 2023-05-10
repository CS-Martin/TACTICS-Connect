<?php

use App\Http\Controllers\ContactUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;

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
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

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

// to delete comments
Route::delete('/comments/{comment_id}', [CommentController::class, 'destroy'])->name('comment.destroy');

/** 
 * @return forum page 
 * */
Route::get('/forum', [ForumController::class, 'index'])->name('forum');

Route::match(['GET', 'POST'], '/posts', [PostController::class, 'store'])->name('posts.store');
Route::put('/like', [PostController::class, 'like'])->name('posts.like');
Route::put('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');

Route::post('/upload-profile-picture', [UserController::class, 'uploadProfilePicture'])->name('upload.profile.picture');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

/**
 * @return profile page
 */
Route::get('/setting', [SettingController::class, 'index'])->name('setting');
Route::delete('/account/delete', [UserController::class, 'destroy'])->name('account.delete');

// Change password
Route::post('/account/update-password', [UserController::class, 'updatePassword'])->name('account.updatePassword');
