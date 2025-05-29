<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\IngressoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// CART CONTROLLER 


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::post('/cart/add/{id_chair}', [CartController::class, 'addCartChair'])->name('cart.addChair');

Route::delete('/cart/clear', [CartController::class, 'ClearChair']);


Route::post('/cart/sale/chairs', [CartController::class, 'FinishFirst']);


Route::get('/cart/all', [CartController::class, 'getCartAll']);


Route::post('/cart/add/user/{user}/{chair}', [CartController::class, 'addCartUser']);


// CHAIR CONTROLLER 


Route::get('/chair/{id_setor}', [ChairController::class, 'index'])->name('chair.index');



// VENDA CONTROLLER


Route::post('/venda/insert',  [VendaController::class, 'insert']);


