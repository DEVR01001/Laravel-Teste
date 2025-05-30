<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChairController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\UserController;
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


Route::delete('/cart/delete/{chair}', [CartController::class, 'deleteUniChair']);


// CHAIR CONTROLLER 


Route::get('/chair/{id_setor}', [ChairController::class, 'index'])->name('chair.index');



// VENDA CONTROLLER


Route::post('/venda/insert',  [VendaController::class, 'insert']);



// QRCODE CONTROLLER 


Route::post('/qrcode/save/{ingressoId}', [QrcodeController::class, 'qrcodeSave'])->name('qrcode.save');



Route::post('/ingresso/mail/{IngressoId}', [QrcodeController::class, 'EmailIngresso']);





Route::post('/user/store', [UserController::class, 'create'])->name('user.create');

Route::get('/user/cadastro', [UserController::class, 'index'])->name('user.index');





Route::get('/qrcode/access/{ingressoId}', [QrcodeController::class, 'VerifiyStatus']);

