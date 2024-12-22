<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/products', [productController::Class,'index'])->name('products.index');
// Route::get('/products/create', [productController::Class,'create'])->name('products.create');
// Route::get('/products/{product}/edit', [productController::Class,'edit'])->name('products.edit');
// Route::post('/products', [productController::Class,'store'])->name('products.store');
// Route::put('/products/{product}', [productController::Class,'update'])->name('products.update');
// Route::delete('/products/{product}', [productController::Class,'destory'])->name('products.destory');

Route::controller(productController::Class)->group(function(){
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::post('/products', 'store')->name('products.store');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'destory')->name('products.destory');
});