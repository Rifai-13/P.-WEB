<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategorisController;

Route::get('/', function () {
    return view('home');
});

// Rute untuk produk
Route::get('/products', [ProductsController::class, 'index']);

// Rute untuk kategori
Route::get('/categori', [CategorisController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

