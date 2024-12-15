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

        // Pass a flag to trigger the modal when the page loads
        return view('app.profile', [
            'user' => $user,
            'showModal' => true, // Pass this flag to the view
        ]);
    }

    public function settings()
    {
        $user = Auth::user(); // Get the logged-in user
        return view('app.settings', compact('user')); // Return the settings page
    }

    public function update(Request $request)
    {
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

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

        return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
    }


}