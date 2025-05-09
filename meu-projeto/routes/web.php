<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SuporteController};
use App\Http\Controllers\ProfileController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
