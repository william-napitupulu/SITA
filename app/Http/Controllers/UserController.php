<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Admin and Editor Specific Routes
    public function index()
    {
        $users = User::all();
        return view('app.kelola_pengguna', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'role' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required',
        ]);

        $data = $request->only('name', 'username', 'role');
        $data['password'] = Hash::make('users'); // Default password

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        User::create($data);

        return redirect()->route('kelola_pengguna.index')->with('success', 'User successfully added.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Prevent editing admin user
        if ($user->role === 'Admin') {
            return redirect()->back()->with('error', 'Admin user cannot be edited.');
        }

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $id,
            'role' => 'required',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'username', 'role');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user->update($data);

        return redirect()->route('kelola_pengguna.index')->with('success', 'User successfully updated.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting admin user
        if ($user->role === 'Admin') {
            return redirect()->back()->with('error', 'Admin user cannot be deleted.');
        }

        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        $user->delete();

        return redirect()->route('kelola_pengguna.index')->with('success', 'User successfully deleted.');
    }
}
