<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChairController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// CART CONTROLLER 


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::post('/cart/add/{id_chair}', [CartController::class, 'addCartChair'])->name('cart.addChair');

Route::delete('/cart/clear', [CartController::class, 'ClearChair']);


Route::post('/cart/sale/chairs', [CartController::class, 'FinishFirst']);


// CHAIR CONTROLLER 


Route::get('/chair/{id_setor}', [ChairController::class, 'index'])->name('chair.index');


