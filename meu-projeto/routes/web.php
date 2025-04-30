<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SuporteController};




Route::delete('suporte/{id}', [SuporteController::class, 'destroy'])->name('suporte.destroy');



Route::put('/suporte/{id}', [SuporteController::class, 'update'])->name('suporte.update');

Route::post('/suporte', [SuporteController::class, 'store'])->name('suporte.store');


Route::get('/suporte/create', [SuporteController::class, 'create'])->name('suporte.create');

Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte.index');

Route::get('suporte/{id}', [SuporteController::class, 'show'])->name('suporte.show');

Route::get('/teste', [SiteController::class, 'teste']);



Route::get('/suporte/{id}/edit', [SuporteController::class, 'edit'])->name('suporte.edit');



Route::get('/', function () {
    return view('welcome');
});
