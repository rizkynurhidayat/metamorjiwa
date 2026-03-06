<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TentangController;


// RoutefolioController;

// Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class, 'view'])->name('Admin');
    // route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}/Edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

    Route::get('/preview', [PreviewController::class, 'view'])->name('preview.index');
    Route::get('/preview/create', [PreviewController::class, 'create'])->name('preview.create');
    Route::post('/preview/create', [PreviewController::class, 'store'])->name('preview.store');
    Route::get('/preview/edit/{preview}', [PreviewController::class, 'edit'])->name('preview.edit');
    Route::put('/preview/edit/{preview}', [PreviewController::class, 'update'])->name('preview.update');
    Route::delete('/preview/{preview}', [PreviewController::class, 'destroy'])->name('preview.destroy');
    
    Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    Route::get('/tentang', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/tentang', [TentangController::class, 'update'])->name('tentang.update');

    Route::get('/service', [ServiceController::class, 'view'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/edit/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/contact', [ContactController::class, 'view'])->name('contact.edit');
    Route::post('/contact', [ContactController::class, 'update'])->name('contact.update');
   
    Route::get('/message', [MessageController::class, 'view'])->name('message.index');
    Route::get('/message/view/{message}', [MessageController::class, 'edit'])->name('message.edit');
    Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');

    Route::get('/testimoni', [TestimoniController::class, 'view'])->name('testimoni.index');
    Route::get('/testimoni/create', [TestimoniController::class, 'create'])->name('testimoni.create');
    Route::post('/testimoni/create', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::get('/testimoni/edit/{testimoni}', [TestimoniController::class, 'edit'])->name('testimoni.edit');
    Route::put('/testimoni/edit/{testimoni}', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
    
    });

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);


    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/', [HomeController::class,'view']);
     
});

Route::post('/message', [HomeController::class, 'store'])->name('message.store');
