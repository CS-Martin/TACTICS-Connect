<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $path = $profilePicture->store('profile_pictures', 'public');

            // Save the file path or filename in the user model
            auth()->user()->update(['profile_picture' => $path]);
        }

        return redirect()->back()->with('success', 'Profile picture uploaded successfully.');
    }
}
