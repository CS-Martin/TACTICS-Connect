<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function destroy()
    {
        $user = Auth::user();

        // Delete the user's account and associated data
        // For example:
        User::destroy($user->id);

        // Logout the user after account deletion
        Auth::logout();

        // Redirect the user to the desired page (e.g., homepage) after deletion
        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
