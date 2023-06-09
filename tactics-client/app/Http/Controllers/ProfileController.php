<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        $bookmarks = Bookmark::query()->orderBy('created_at', 'desc')->get();
        return view('profile', compact('posts'))->with('bookmarks', $bookmarks);
    }
}
