<?php

use App\Http\Controllers\CadeirasController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\IngressosController;
use App\Http\Controllers\PerfilsController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\SetoresController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('usuarios', UsuariosController::class);

Route::resource('perfils', PerfilsController::class);

Route::get('/UsuariosCadastrar', function(){
    return view('usuarios-cadastrar');
});


Route::get('/EventosCadastrar', function(){
    return view('eventos-cadastrar');
});


Route::get('/SetoresCadastrar/{id}', function(){

    dd('id');
    return view('setores-cadastrar', compact('id'));
});




Route::resource('eventos', EventosController::class);

Route::resource('setores', SetoresController::class);

Route::resource('cadeiras', CadeirasController::class);


Route::resource('vendas', VendasController::class);

Route::get('/VendaEventos', function(){
    return view('vendas-listar-eventos');
});




Route::get('/vendasIngresso/{id}', [VendasController::class, 'ingresso'])
    ->name('vendas.ingresso');



    
Route::resource('carts', CartController::class);


Route::get('carts/{id}/delete', [CartController::class, 'delete'])->name('cart.delete');


Route::resource('ingressos', IngressosController::class);



Route::get('qr-code', [QRCodeController::class, 'index']);