<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Profile Page
    public function index()
    {
        return view('profile.profile');
    }

    // Edit Page
    public function edit()
    {
        return view('profile.edit-profile');
    }

    // Update Profile

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',

            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'password' => 'nullable|min:8|confirmed',
        ]);

        // Profile information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->gender = $request->gender;


        // Profile photo
        if ($request->hasFile('profile_photo')) {

            $file = $request->file('profile_photo');

            $filename = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs(
                'profile-photos',
                $filename,
                'public'
            );

            $user->profile_photo = $path;
        }


        // 🔐 PASSWORD UPDATE
        if ($request->filled('password')) {

            $user->password = Hash::make($request->password);
        }


        $user->save();

        return redirect()
            ->route('profile')
            ->with('success', 'Profile updated successfully!');
    }
    
}