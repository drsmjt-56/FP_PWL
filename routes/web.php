<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// BACKEND CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PembayaranController;

// FRONTEND CONTROLLER
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\FrontendProdukController;
use App\Http\Controllers\Frontend\FrontendKontakController;

Route::get('/', function () {
    return redirect()->route('frontend.home');
});

/*
 AUTH
--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

/*
 BACKEND / ADMIN
--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/chart-data', [DashboardController::class, 'chartData'])
        ->name('dashboard.chart');

    // PRODUK 
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // KATEGORI 
    Route::resource('kategori', KategoriController::class);

    // KONTAK
    Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
    Route::get('/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontak/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
    Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

    // PEMBAYARAN
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
});

/*
FRONTEND
--------------------------------------------------------------------------
*/

//HOME
Route::get('/home', [FrontendController::class, 'home'])->name('frontend.home');

//ABOUT
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');

//CARA PESAN
Route::get('/cara_pesan', [FrontendController::class, 'caraPesan'])
    ->name('cara_pesan');

Route::post('/kontak', [FrontendKontakController::class, 'store'])
->name('frontend.kontak.store');


// PRODUK FRONTEND
Route::get('/produk', [FrontendProdukController::class, 'index'])
    ->name('frontend.produk');

//KONTAK
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('frontend.kontak');
