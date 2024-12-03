<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('profile', compact('user')); // Return the profile page
    }

    public function settings()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('settings', compact('user')); // Return the settings page
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'current_password' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update user details
        $user->name = $request->name;
        $user->username = $request->username;

        // Update password if a new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update profile photo if a new one is uploaded
        if ($request->hasFile('profile_photo')) {
            // Delete old profile photo if it exists
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Store the new profile photo
            $photo = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $photo;
        }

        $user->save(); // Save updated user data

        return redirect()->route('profile.settings')->with('status', 'Profile updated successfully!');
    }
}
