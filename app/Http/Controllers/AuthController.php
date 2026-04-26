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
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users,username|alpha_dash',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'birth_date' => 'required|date|before_or_equal:' . now()->subYears(17)->format('Y-m-d'),
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]+$/'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',
            'name.max' => 'Nama lengkap maksimal 255 karakter.',
            
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username maksimal 50 karakter.',
            'username.unique' => 'Username ini sudah digunakan, silakan pilih yang lain.',
            'username.alpha_dash' => 'Username hanya boleh berisi huruf, angka, strip, dan garis bawah (_).',
            
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Pilihan jenis kelamin tidak valid.',
            
            'birth_date.required' => 'Tanggal lahir wajib diisi.',
            'birth_date.date' => 'Format tanggal lahir tidak valid.',
            'birth_date.before_or_equal' => 'Maaf, Anda harus berusia minimal 17 tahun untuk membuat akun.',
            
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email ini sudah terdaftar.',
            
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.regex' => 'Kata sandi harus mengandung kombinasi huruf besar, kecil, angka, dan bentuk simbol (!@#$%^&*). Simbol lain atau spasi tidak diperbolehkan.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('is_register', true);
        }

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

        // Redirect ke landing page agar bisa login
        return redirect('/')->with('register_success', 'Hore! Akun kamu berhasil dibuat. Silakan masuk untuk memulai.');
    }

    // Handle Login Logic
    public function loginProcess(Request $request)
    {
        // 1. Validasi Strict Email
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('is_login', true);
        }

        // 2. Ambil hanya email & password
        $credentials = $request->only('email', 'password');

        // 3. Attempt Login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect ke dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('login_success', $user->name);
        }

        // 4. Kalau Gagal
        return back()->with('login_error', 'Email atau kata sandi yang kamu masukkan salah.')->withInput()->with('is_login', true);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        $name = '';
        if (Auth::check()) {
            $name = Auth::user()->name;
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('logout_success', $name); // Balik ke landing page
    }
}
