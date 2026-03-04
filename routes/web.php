<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/Admin',[AdminController::class, 'view'])->name('Admin');
    // route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/', [HomeController::class,'view']);
});

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('auth.login');
});
