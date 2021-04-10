<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (session('token') != null)
        return redirect(\route('dashboard.index'));
    else
        return redirect(\route('view.login'));
});

Route::middleware(['session'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard.index');
});

Route::middleware(['state'])->group(function () {
    Route::view('/login', 'auth.login')->name('view.login');
    Route::view('/register', 'auth.register')->name('view.register');

    Route::post('/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');
});

Route::get('/logout', function () {
    session()->forget('token');
    return redirect(\route('view.login'));
});
