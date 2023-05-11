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

        // Check if bookmark already exists for this post and user combination
        $bookmarkExists = Bookmark::where('user_id', $user->id)
            ->where('post_id', $post_id)
            ->exists();

        if ($bookmarkExists) {
            return response()->json(['bookmarked' => true]);
        }

        $bookmark = new Bookmark();
        $bookmark->user_id = $user->id;
        $bookmark->post_id = $post_id;
        $bookmark->save();

        return response()->json(['bookmarked' => true]);
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        $post_id = $request->input('post_id');

        // Find the bookmark for this user and post combination
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('post_id', $post_id)
            ->first();

        if (!$bookmark) {
            return redirect()->back()->with('error', 'Bookmark does not exist.');
        }

        // Delete the bookmark
        $bookmark->delete();

        // add logic to remove the bookmark
        return response()->json(['bookmarked' => false]);
    }
}