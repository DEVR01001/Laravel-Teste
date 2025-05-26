<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('books', BookController::class);


