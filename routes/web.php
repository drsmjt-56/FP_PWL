<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;

//ADMIN
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

//FRONTEND

/*
| AUTH
|--------------------------------------------------------------------------
*/

//Route login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login']);

<<<<<<< HEAD
// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');



//Route kategori
=======

/*
| ADMIN / BACKEND
|--------------------------------------------------------------------------
*/

//Route About
>>>>>>> 3c16a08dd6b96c1c29343e0e20d8a3def702a761

Route::prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
});


//dashboard selvie
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/dashboard/chart-data', [DashboardController::class, 'chartData'])
    ->middleware('auth');


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


Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])
    ->name('produk.destroy');

//route kontak
Route::get('/kontak', [KontakController::class,'index']);
Route::post('/kontak', [KontakController::class,'store']);
Route::get('/kontak/{id}/edit', [KontakController::class,'edit']);
Route::put('/kontak/{id}', [KontakController::class,'update']);
Route::delete('/kontak/{id}', [KontakController::class, 'destroy']);
//kontak selvie 
Route::get('/kontak', [KontakController::class, 'index'])
    ->name('kontak.index');




/*
| FRONTEND
|--------------------------------------------------------------------------
*/

