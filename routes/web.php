<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MessageController;


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

    Route::get('/portofolio', [PortofolioController::class, 'view'])->name('portofolio.index');
    Route::get('/portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.create');
    Route::post('/portofolio/create', [PortofolioController::class, 'store'])->name('portofolio.store');
    Route::get('/portofolio/edit/{portofolio}', [PortofolioController::class, 'edit'])->name('portofolio.edit');
    Route::put('/portofolio/edit/{portofolio}', [PortofolioController::class, 'update'])->name('portofolio.update');
    Route::delete('/portofolio/{portofolio}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');
    
    Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    Route::get('/service', [ServiceController::class, 'view'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/edit/{service}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::get('/team', [TeamController::class, 'view'])->name('team.index');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team/create', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/edit/{team}', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/edit/{team}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{team}', [TeamController::class, 'destroy'])->name('team.destroy');

    Route::get('/message', [MessageController::class, 'view'])->name('message.index');
    Route::get('/message/view/{message}', [MessageController::class, 'edit'])->name('message.edit');
    Route::delete('/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    
    });

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);


    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/', [HomeController::class,'view']);
    Route::post('/message', [HomeController::class, 'store'])->name('message.store');
     
});



   
