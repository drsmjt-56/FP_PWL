<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Frontend\HomeController as FrontHome;

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontHome::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Admin Home (sementara TANPA auth)
|--------------------------------------------------------------------------
*/
Route::get('/admin/home', [AdminHome::class, 'index'])->name('admin.home');
Route::post('/admin/home', [AdminHome::class, 'update'])->name('admin.home.update');
