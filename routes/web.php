<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EducationController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('user.welcome');
})->name('login');

// Authentication Logic (Register & Login)
Route::post('/register-process', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('login.process');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Self-Evaluation Routes
    
    // Cover Page
    Route::get('/self-evaluation-cover', [EvaluationController::class, 'cover'])->name('evaluation.cover');
    
    // Start Evaluation (Clears Session)
    Route::get('/self-evaluation-start', [EvaluationController::class, 'start'])->name('evaluation.start');

    // Dynamic Questions (Pages 1-3)
    Route::get('/question/{page}', [EvaluationController::class, 'question'])->name('evaluation.question');
    Route::post('/question/{page}', [EvaluationController::class, 'storeQuestion'])->name('evaluation.store');

    // Venting Stage
    Route::get('/venting', [EvaluationController::class, 'vent'])->name('evaluation.vent');
    Route::post('/venting-submit', [EvaluationController::class, 'submit'])->name('evaluation.submit');

    // Evaluation Result
    Route::get('/result/{id}', [EvaluationController::class, 'showResult'])->name('evaluation.result');

    // Activity History Detail
    Route::get('/activity-history/{id}', [EvaluationController::class, 'historyDetail'])->name('evaluation.history');

    // Education Feature
    Route::get('/education', [EducationController::class, 'index'])->name('education.index');
});