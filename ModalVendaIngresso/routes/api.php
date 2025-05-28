<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchUsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





Route::get('/chairs/{cart?}', [CartController::class,'checkChairs'])->name('check.chairs');


Route::get('/users', SearchUsersController::class)->name('users.search');