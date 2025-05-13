<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\PerfilsController;
use App\Http\Controllers\SetoresController;
use App\Http\Controllers\UsuariosController;
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

