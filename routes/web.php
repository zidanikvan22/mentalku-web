<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('user/dashboard');
});

Route::get('/self-evaluation-cover', function () {
    return view('user/self-evaluation-cover');
});

Route::get('/self-evaluation-question', function () {
    return view('user/self-evaluation-question');
});

Route::get('/self-evaluation-vent', function () {
    return view('user/self-evaluation-vent');
});