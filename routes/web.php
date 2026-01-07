<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Controllers
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Admin\AboutController;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController as FrontHome;

// Other Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontakController;

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontHome::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Home
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/home', [AdminHome::class, 'index'])->name('admin.home');
    Route::post('/home', [AdminHome::class, 'update'])->name('admin.home.update');

    Route::get('/about', [AboutController::class, 'index']);
    Route::put('/about/{id}', [AboutController::class, 'update']);
});

/*
|--------------------------------------------------------------------------
| Kontak
|--------------------------------------------------------------------------
*/
Route::get('/kontak', [KontakController::class,'index']);
Route::post('/kontak', [KontakController::class,'store']);
Route::put('/kontak/{id}', [KontakController::class,'update']);
Route::delete('/kontak/{id}', [KontakController::class, 'destroy']);
