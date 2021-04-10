<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['session'])->group(function () {
    Route::view('/dashboard', null);
});

Route::view('/login', '');
Route::view('/register', 'auth.register');

Route::post('/register', [AuthController::class, 'register'])->name('user.register');
