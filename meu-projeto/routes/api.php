<?php

use App\Http\Controllers\Api\SuporteController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/suporte', SuporteController::class);
