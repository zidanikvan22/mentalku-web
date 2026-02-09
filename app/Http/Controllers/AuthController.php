<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Handle Register Logic
    public function registerProcess(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username|alpha_dash', // alpha_dash: huruf, angka, dash, underscore
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // confirmed ngecek field password_confirmation
        ]);

        // 2. Create User
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'role' => 'user', // Default role
        ]);

        // 3. Auto Login setelah register
        Auth::login($user);

        // 4. Redirect ke Dashboard
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    // Handle Login Logic
    public function loginProcess(Request $request)
    {
        // 1. Validasi Strict Email
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Ambil hanya email & password
        $credentials = $request->only('email', 'password');

        // 3. Attempt Login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke dashboard
            return redirect()->intended('dashboard');
        }

        // 4. Kalau Gagal
        return back()->with('error', 'Email atau password salah.');
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Balik ke landing page
    }
}
