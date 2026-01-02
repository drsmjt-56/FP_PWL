<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'index']);
    Route::put('/about/{id}', [AboutController::class, 'update']);
});