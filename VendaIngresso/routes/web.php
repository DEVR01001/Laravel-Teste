<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChairController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::delete('chair/{chair}/remove-session', [CartController::class, 'removeSession']);




Route::get('/chair/{id_setor}', [ChairController::class, 'index'])->name('chair.index');


Route::post('/chair/{id_chair}/{id_user}', [CartController::class, 'addCart'])->name('chair.addCart');


Route::delete('/cart/clear', [CartController::class, 'clearCart']);



Route::delete('/cart/delete/{id}', [CartController::class, 'deleteChair']);



