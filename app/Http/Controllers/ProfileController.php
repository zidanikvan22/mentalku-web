<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // 1. Tampilkan Halaman Profil
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    // 2. Tampilkan Halaman Edit
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile-edit', compact('user'));
    }

    // 3. Proses Update Profil
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        // Validasi input (Hanya field yang BOLEH diedit)
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'job' => 'nullable|string|max:100',
            'marital_status' => 'nullable|string',
            'living_condition' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'education' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // Logic Update Foto Profil
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada (dan bukan default/ui-avatars)
            if ($user->profile_photo_path && Storage::exists('public/' . $user->profile_photo_path)) {
                Storage::delete('public/' . $user->profile_photo_path);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        // Cek jika user minta hapus foto (opsional, via tombol hapus)
        if ($request->has('delete_photo') && $request->delete_photo == '1') {
            if ($user->profile_photo_path && Storage::exists('public/' . $user->profile_photo_path)) {
                Storage::delete('public/' . $user->profile_photo_path);
            }
            $user->profile_photo_path = null;
        }

        // Update Data Text (Hanya field yang diizinkan)
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
