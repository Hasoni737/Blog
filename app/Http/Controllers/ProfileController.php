<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Mockery\Matcher\HasKey;

class ProfileController extends Controller
{
    # Show Profile
    public function index()
    {
        // Get Data Of User From DB
        $user = Auth::user();

        // Redirection
        return view('profile.index', ['user' => $user]);
    }

    # Add Profile Image
    public function uploadProfileImage(Request $request)
    {
        $user = Auth::user();
        // Clean data
        $request->validate([
            'profile_image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:5048',
                'dimensions:min_width=100,min_height=100'
            ]
        ]);

        // Storage The Image
        $image = $request->file('profile_image');
        // Create Slog
        $slug = Str::slug(Auth::user()->first_name . '-' . Auth::user()->last_name, '-');
        // Make unique image name
        $image_name = uniqid() . '-' . $slug . '.' . $image->extension();

        // Update Image
        $old_image_path = public_path('users/images/' . $user->profile_image);
        if ($user->profile_image !== 'default_user.png') {
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        // Move Image
        $image->move(public_path('users/images'), $image_name);

        // Get User
        $user = Auth::user();
        // Update Profile Photo Into DB
        $user->update([
            'profile_image' => $image_name
        ]);

        return to_route('profile.index')->with('success', 'Profile Photo Uploaded Successfully');
    }

    # Delete Profile Image
    public function deleteProfileImage(Request $request)
    {
        // Get User
        $user = Auth::user();

        // Detele Image From Images
        $image_path = public_path('users/images/' . $user->profile_image);
        if ($user->profile_image == 'default_user.png') {
            return to_route('profile.index')->with('error', 'You dont have profile photo');
        } else {
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Delete Profile Photo Into DB
        $user->update([
            'profile_image' => 'default_user.png'
        ]);

        return to_route('profile.index')->with('success', 'Profile Photo Deleted Successfully');
    }

    # Show Edit Form
    public function edit()
    {
        // Get User
        $user = Auth::user();
        return view('profile.edit', ['user' => $user]);
    }

    # Update Data
    public function update(Request $request)
    {
        // User
        $user = Auth::user();

        // Verify Data
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'phone_number' => ['nullable', 'string', 'min:10', 'max:20', 'regex:/^([0-9\s\-\+\(\)]*)$/', Rule::unique(User::class)->ignore($user->id)],
        ]);

        // Updating
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // Redirection
        return to_route('profile.index')->with('success', 'Personal information updated successfully');
    }

    # Show Edit Form Of Password
    public function editPassword()
    {
        return view('profile.edit-password');
    }

    # Update Password
    public function updatePassword(Request $request)
    {
        // User
        $user = Auth::user();


        // Verify Data
        $request->validate([
            'old_password' => ['required', Rules\Password::defaults()],
            'new_password' => ['required', 'confirmed', 'different:old_password', Rules\Password::defaults()],
        ]);

        // Check If The Old Password Correct
        if(!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'The old password is incorrect.');
        }

        // Updating
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        // Redirection
        return to_route('profile.index')->with('success', 'Password updated successfully');
    }
}
