<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KategoriController;

//FRONTEND

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN / BACKEND
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |-------------------------
    | Dashboard
    |-------------------------
    */
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/chart-data', [DashboardController::class, 'chartData']);


    /*
    |-------------------------
    | PRODUK
    |-------------------------
    */
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

    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])
        ->name('produk.destroy');


    /*
    |-------------------------
    | KONTAK
    |-------------------------
    */
    Route::get('/kontak', [KontakController::class, 'index'])
        ->name('kontak.index');

    Route::post('/kontak', [KontakController::class, 'store'])
        ->name('kontak.store');

    Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])
        ->name('kontak.edit');

    Route::put('/kontak/{id}', [KontakController::class, 'update'])
        ->name('kontak.update');

    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])
        ->name('kontak.destroy');


    /*
    |-------------------------
    | PEMBAYARAN 
    |-------------------------
    */
    Route::get('/pembayaran', [PembayaranController::class, 'index'])
        ->name('pembayaran.index');

    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])
        ->name('pembayaran.edit');

    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])
        ->name('pembayaran.destroy');


    /*
    |-------------------------
    | KATEGORI
    |-------------------------
    */
    Route::resource('kategori', KategoriController::class);
});


//FRONTEND
