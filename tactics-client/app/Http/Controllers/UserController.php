<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    // Delete an account 
    public function destroy()
    {
        $user = Auth::user();

        // Delete the user's account and associated data
        // For example:
        $user->Post()->delete();
        User::destroy($user->id);

        // Logout the user after account deletion
        Auth::logout();

        // Redirect the user to the desired page (e.g., homepage) after deletion
        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }

    // Request new password
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Incorrect current password']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
