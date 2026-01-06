<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\KontakController;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::get('/', function() {
    return view('login');
});

Route::prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'index']);
    Route::put('/about/{id}', [AboutController::class, 'update']);
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware('auth');









//route kontak
Route::get('/kontak', [KontakController::class,'index']);
Route::post('/kontak', [KontakController::class,'store']);
Route::get('/kontak/{id}/edit', [KontakController::class,'edit']);
Route::put('/kontak/{id}', [KontakController::class,'update']);
Route::delete('/kontak/{id}', [KontakController::class, 'destroy']);

//test push
//test part2
//test 3
