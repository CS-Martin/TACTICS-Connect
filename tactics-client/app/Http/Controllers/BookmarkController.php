<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        $post_id = $request->input('post_id');

        $bookmark = new Bookmark();
        $bookmark->user_id = $user->id;
        $bookmark->post_id = $post_id;
        $bookmark->save();

        return response()->json(['success' => true]);
    }

}