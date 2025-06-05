<?php

use App\Http\Controllers\ChairController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('adm.listar_eventos');
});




Route::resource('login', LoginController::class);
Route::resource('user', UserController::class);
Route::resource('sale', SaleController::class);
Route::resource('sector', SectorController::class);
Route::resource('ticket', TicketController::class);
Route::resource('event', EventController::class);
Route::resource('chair',ChairController::class);



Route::get('/eventos-saller', function(){
    return view('saller.eventos_saller');
});


Route::get('/cart', function(){
    return view('saller.mapa_cart_saller');
});



Route::get('/usuarios-saller', function(){
    return view('saller.usuarios_saller');
});


Route::get('/ticketlist', function(){
    return view('adm.listar_ingressos');
});