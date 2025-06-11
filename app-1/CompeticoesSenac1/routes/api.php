<?php

use App\Http\Controllers\ChairController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsTotem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');






Route::middleware([IsTotem::class])->group(function(){

    Route::get('/qrcode', [QrcodeController::class, 'getCodQrcode'])->name('qrcode.getCodQrcode');

    Route::post('qrcode/valid/{codigo}', [QrcodeController::class, 'ValidQrcode']);

    Route::get('/qrcode/access/{ticketId}', [QrcodeController::class, 'ValidCam']);


});



Route::get('/user/type/{typeUser}', [UserController::class, 'GetUserType']);




Route::get('/user/search', [UserController::class, 'GetSearchUser']);

Route::get('/event/search', [EventController::class, 'GetSearchEvent']);


Route::get('/sector/search', [SectorController::class, 'GetSearchSector']);


Route::get('/chair/search', [ChairController::class, 'GetSearchChair']);



Route::get('/event/verify', [EventController::class, 'VerifyEventQuant'])->name('event.verify');
