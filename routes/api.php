<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [ClienteController::class, 'login']);


/*Clientes*/
Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/{cliente}', [ClienteController::class, 'show']);
Route::post('/clientes/registrar', [ClienteController::class, 'store']);
Route::post('/clientes/actualizar/{cliente}', [ClienteController::class, 'update']);
Route::post('/clientes/eliminar/{cliente}', [ClienteController::class, 'destroy']);
