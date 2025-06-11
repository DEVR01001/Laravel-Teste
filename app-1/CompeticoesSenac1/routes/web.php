<?php

use App\Http\Controllers\ChairController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdm;
use App\Http\Middleware\IsSaller;
use App\Http\Middleware\IsTotem;
use Illuminate\Support\Facades\Route;





Route::resource('login', LoginController::class);
Route::resource('user', UserController::class);
Route::resource('sale', SaleController::class);
Route::resource('sector', SectorController::class);
Route::resource('ticket', TicketController::class);
Route::resource('event', EventController::class);
Route::resource('chair',ChairController::class);
Route::resource('map', MapController::class);
Route::resource('qrcode', QrcodeController::class);



Route::get('/ticketlist', function(){
    return view('adm.listar_ingressos');
});



Route::get('/', function(){
    return view('layout.login');
});




Route::middleware([IsSaller::class])->group(function(){

    Route::get('sectorSaller/{id}', [SectorController::class, 'chairsSector'])->name('sectorSaller.chairsSector');

    
    Route::get('/eventos-saller', function(){
        return view('saller.eventos_saller');
    });

    Route::get('/cart', function(){
        return view('saller.mapa_cart_saller');
    });

    
    Route::get('/usuarios-saller', function(){
        return view('saller.usuarios_saller');
    });

    
    Route::get('userCart', [UserController::class, 'GetUser'])->name('userCart.getUser');

    

    Route::post('userCart', [UserController::class, 'CreateUserSaller'])->name('userCart.CreateUserSaller');


    Route::post('/ingresso/mail/{IngressoId}', [QrcodeController::class, 'EmailIngresso']);


    Route::post('/qrcode/store/{idIngresso}', [QrcodeController::class, 'store'])->name('qrcode.store');


});






Route::get('Getqrcode', [QrcodeController::class, 'getCodQrcode'])->name('Getqrcode.getCodQrcode');




Route::post('/check-qrcode', [QrCodeController::class, 'checkCam']);


Route::get('/totem', function(){

    return view('totem.verify-totem');
})->name('totem.index');

Route::get('logout', [LoginController::class, 'logout']);







