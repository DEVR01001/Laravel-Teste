<?php

use App\Http\Controllers\PerfilsController;
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