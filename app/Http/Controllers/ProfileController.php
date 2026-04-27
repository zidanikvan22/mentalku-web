<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Display profile page
    public function index(\Illuminate\Http\Request $request)
    {
        $query = \App\Models\EvaluationResult::where('user_id', \Illuminate\Support\Facades\Auth::id());

        // Filter by final evaluation level
        if ($request->has('level') && $request->level != 'Semua') {
            $query->where('final_level', $request->level);
        }

        // Sort chronologically (default is newest first)
        $sortOrder = $request->sort == 'asc' ? 'asc' : 'desc'; 
        $query->orderBy('created_at', $sortOrder);

        // Paginate results (3 items per page) and append query string to prevent pagination errors
        $histories = $query->paginate(3)->appends($request->query());

        return view('user.profile', compact('histories'));
    }

    // Display profile edit page
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile-edit', compact('user'));
    }

    // Process profile update
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Validate input (Only allow specific fields to be updated)
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'job' => 'nullable|string|max:100',
            'marital_status' => 'nullable|string',
            'living_condition' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'education' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maximum file size 2MB
        ], [
            'profile_photo.image' => 'Foto profil harus berupa file gambar.',
            'profile_photo.mimes' => 'Foto profil harus berformat jpeg, png, atau jpg.',
            'profile_photo.max' => 'Ukuran foto profil tidak boleh lebih dari 2MB.'
        ]);

        // Check for file errors (e.g., exceeding upload_max_filesize in php.ini)
        if ($request->has('profile_photo') && $request->file('profile_photo') != null && !$request->file('profile_photo')->isValid()) {
            return back()->withInput()->withErrors(['profile_photo' => 'Ukuran file gambar terlalu besar atau terjadi kesalahan. (Max 2MB)']);
        }

        // Process profile photo update
        if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
            // Remove old photo if it exists
            if ($user->profile_photo_path && Storage::exists('public/' . $user->profile_photo_path)) {
                Storage::delete('public/' . $user->profile_photo_path);
            }

            // Save new photo
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
            
            // Disable photo deletion flag to prevent conflicts
            $request->merge(['delete_photo' => '0']);
        }

        // Check if user requested photo deletion (optional, via delete button)
        if ($request->has('delete_photo') && $request->delete_photo == '1') {
            if ($user->profile_photo_path && Storage::exists('public/' . $user->profile_photo_path)) {
                Storage::delete('public/' . $user->profile_photo_path);
            }
            $user->profile_photo_path = null;
        }

        // Update user textual data (only permitted fields)
        $user->phone = $request->phone;
        $user->job = $request->job;
        $user->marital_status = $request->marital_status;
        $user->living_condition = $request->living_condition;
        $user->city = $request->city;
        $user->education = $request->education;

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
