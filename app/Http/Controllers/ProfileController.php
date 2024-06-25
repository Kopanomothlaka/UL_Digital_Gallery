<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('show', compact('user'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }


    public function edit()
    {
        $user = auth()->user();
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        // Validate the request
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Update user details if provided
        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName); // Store image in storage/app/public/profile_pictures

            $user->profile_picture = 'storage/profile_pictures/' . $imageName;
            $user->save();
        }


        $user->save();
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }


}
