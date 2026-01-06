<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\AuthController;
 fitur-produk
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\KontakController;
main

//Route login
Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::get('/', function() {
    return view('login');
});

fitur-produk
//Route About

fitur-kontak


main
main
Route::prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
 fitur-produk

fitur-kontak


main
 main
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
Route::put('/kontak/{id}', [KontakController::class,'update']);
Route::delete('/kontak/{id}', [KontakController::class, 'destroy']);


//Route Produk
Route::get('/produk', [ProdukController::class, 'index'])
    ->name('produk.index');

Route::get('/produk/create', [ProdukController::class, 'create'])
    ->name('produk.create');

Route::post('/produk', [ProdukController::class, 'store'])
    ->name('produk.store');

Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])
    ->name('produk.edit');

Route::put('/produk/{id}', [ProdukController::class, 'update'])
    ->name('produk.update');

fitur-produk
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])
    ->name('produk.destroy');

//route kontak
Route::get('/kontak', [KontakController::class,'index']);
Route::post('/kontak', [KontakController::class,'store']);
Route::get('/kontak/{id}/edit', [KontakController::class,'edit']);
Route::put('/kontak/{id}', [KontakController::class,'update']);
Route::delete('/kontak/{id}', [KontakController::class, 'destroy']);

//test push
//test part2
//test 3
main
