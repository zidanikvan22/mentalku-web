<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register-process', [AuthController::class, 'registerProcess'])->name('register.process');

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

// Login Logic
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/test-login', 'auth.login');

// Route::view('/test-register', 'auth.register');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
});

Route::get('/test', function () {
    return view('test');
});

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// });

Route::get('/self-evaluation-cover', function () {
    return view('user.self-evaluation-cover');
});

Route::get('/self-evaluation-question', function () {
    return view('user.self-evaluation-question');
});

Route::get('/self-evaluation-vent', function () {
    return view('user.self-evaluation-vent');
});

Route::get('/self-evaluation-results', function () {
    return view('user.self-evaluation-results');
});

Route::get('/education', function () {
    return view('user.education');
});

Route::get('/education-detail', function () {
    return view('user.education-detail');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/profile-edit', function () {
    return view('user.profile-edit');
});

Route::get('/test1', function () {
    return view('user.test1');
});

Route::view('/test-register', 'auth.register');