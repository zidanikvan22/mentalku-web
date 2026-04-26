<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EducationController;

/*
|--------------------------------------------------------------------------
| 🟢 Public
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('user.welcome');
})->name('login');

// Logic Auth (Register & Login)
Route::post('/register-process', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('login.process');


/*
|--------------------------------------------------------------------------
| 🔒 Login Required
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    // 1. Dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    // 2. Profile Management (Pake Controller Baru)
    // Note: Route statis '/profile' dan '/profile-edit' yang lama SUDAH DIGANTI ini.
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // 3. Logout Logic
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // === EVALUATION ROUTES ===
    
    // 1. Cover
    Route::get('/self-evaluation-cover', [EvaluationController::class, 'cover'])->name('evaluation.cover');
    
    // 2. Start Logic (Clear Session)
    Route::get('/self-evaluation-start', [EvaluationController::class, 'start'])->name('evaluation.start');

    // 3. Questions (Dynamic Page 1-3)
    Route::get('/question/{page}', [EvaluationController::class, 'question'])->name('evaluation.question');
    Route::post('/question/{page}', [EvaluationController::class, 'storeQuestion'])->name('evaluation.store');

    // 4. Venting
    Route::get('/venting', [EvaluationController::class, 'vent'])->name('evaluation.vent');
    Route::post('/venting-submit', [EvaluationController::class, 'submit'])->name('evaluation.submit');

    // 5. Result
    Route::get('/result/{id}', [EvaluationController::class, 'showResult'])->name('evaluation.result');

    // 6. Activity History Detail
    Route::get('/activity-history/{id}', [EvaluationController::class, 'historyDetail'])->name('evaluation.history');

    // 4. Fitur Evaluasi Diri (Sementara masih View Only dulu)
    // Kita amanin di sini biar tamu gak bisa asal akses tes mental.
    // Route::get('/self-evaluation-cover', function () {
    //     return view('user.self-evaluation-cover');
    // });
    // Route::get('/self-evaluation-question', function () {
    //     return view('user.self-evaluation-question');
    // });
    // Route::get('/self-evaluation-vent', function () {
    //     return view('user.self-evaluation-vent');
    // });
    // Route::get('/self-evaluation-results', function () {
    //     return view('user.self-evaluation-results');
    // });

    // 5. Fitur Edukasi (View Only)
    Route::get('/education', [EducationController::class, 'index'])->name('education.index');
    // Route::get('/education', function () {
    //     return view('user.education');
    // });
    // Route::get('/education-detail', function () {
    //     return view('user.education-detail');
    // });
});


/*
|--------------------------------------------------------------------------
| 🗑️ DEPRECATED / TESTING 
|--------------------------------------------------------------------------
*/

// Route::view('/test-login', 'auth.login');
// Route::view('/test-register', 'auth.register');
// Route::get('/test', function () { return view('test'); });
// Route::get('/test1', function () { return view('user.test1'); });
// Route::get('/app', function () { return view('app'); });