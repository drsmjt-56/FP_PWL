<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ======================
// AUTH & ADMIN CONTROLLER
// ======================
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;       // ADMIN PRODUK
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KategoriController;

// ======================
// FRONTEND CONTROLLER
// ======================
use App\Http\Controllers\Frontend\FrontendProdukController; // ✅ BARU (FRONTEND)

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// ⛔ JANGAN LANGSUNG KE DASHBOARD
Route::get('/', function () {
    return redirect()->route('login');
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

// LOGOUT
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
| SEMUA ADMIN PAKAI PREFIX /admin
| WAJIB LOGIN
*/

Route::middleware('auth')->prefix('admin')->group(function () {

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
    | PRODUK (ADMIN)
    | URL: /admin/produk
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
    | KONTAK (ADMIN)
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
    | PEMBAYARAN (ADMIN)
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
    | KATEGORI (ADMIN)
    |-------------------------
    */
    Route::resource('kategori', KategoriController::class);
});


/*
|--------------------------------------------------------------------------
| FRONTEND / PUBLIK
|--------------------------------------------------------------------------
| TANPA LOGIN
*/

// ✅ FRONTEND PRODUK
// URL: /produk
Route::get('/produk', [FrontendProdukController::class, 'index'])
    ->name('frontend.produk');
