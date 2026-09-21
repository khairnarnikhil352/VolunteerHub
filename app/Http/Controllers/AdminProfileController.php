<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminProfileController extends Controller
{
    /**
     * Display Admin Profile
     */
    public function show()
    {
        $user = Auth::user();

        // Admin profile statistics
        $stats = [
            'volunteers' => User::where('role', 'volunteer')->count(),

            'events' => Event::count(),

            'applications' => EventRegistration::count(),

            'approved' => EventRegistration::whereRaw(
                'LOWER(status) = ?',
                ['approved']
            )->count(),
        ];

        return view('admin.profile.show', compact(
            'user',
            'stats'
        ));
    }


    /**
     * Show Edit Admin Profile page
     */
    public function edit()
    {
        $user = Auth::user();

        return view('admin.profile.edit', compact('user'));
    }


    /**
     * Update Admin Profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => [
                'nullable',
                'digits:10',
                Rule::unique('users', 'phone')->ignore($user->id),
            ],

            'dob' => [
                'nullable',
                'date',
            ],

            'gender' => [
                'nullable',
                'in:Male,Female,Other',
            ],

            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Basic Information
        |--------------------------------------------------------------------------
        */

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->dob = $validated['dob'] ?? null;
        $user->gender = $validated['gender'] ?? null;


        /*
        |--------------------------------------------------------------------------
        | Profile Photo Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_photo')) {

            // Delete old profile photo
            if (
                $user->profile_photo &&
                Storage::disk('public')->exists($user->profile_photo)
            ) {
                Storage::disk('public')->delete(
                    $user->profile_photo
                );
            }

            // Store new profile photo
            $photoPath = $request
                ->file('profile_photo')
                ->store('profile-photos', 'public');

            $user->profile_photo = $photoPath;
        }


        /*
        |--------------------------------------------------------------------------
        | Password Update
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['password'])) {

            $user->password = Hash::make(
                $validated['password']
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Save User
        |--------------------------------------------------------------------------
        */

        $user->save();


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.profile.show')
            ->with(
                'success',
                'Admin profile updated successfully!'
            );
    }


    /**
     * Update Password Only
     *
     * Useful if later you want a separate
     * Change Password page.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([

            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed',
            ],
        ]);


        $user->password = Hash::make(
            $validated['password']
        );

        $user->save();


        return redirect()
            ->route('admin.profile.edit')
            ->with(
                'success',
                'Password changed successfully!'
            );
    }
}