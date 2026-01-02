<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontakController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'index']);
    Route::put('/about/{id}', [AboutController::class, 'update']);
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    if (!session('is_logged_in')) {
        return redirect('/login');
    }
    return view('dashboard');
});










//route kontak
Route::get('/kontak', [KontakController::class,'index']);
Route::post('/kontak', [KontakController::class,'store']);
Route::put('/kontak/{id}', [KontakController::class,'update']);
Route::delete('/kontak/{id}', [KontakController::class, 'destroy']);

//test push
//test part2
//test 3
