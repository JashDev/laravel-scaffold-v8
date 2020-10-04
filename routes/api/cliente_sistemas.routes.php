<?php

use App\Http\Controllers\ClienteSistemaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
  Route::group(['middleware' => 'auth.jwt'], function () {
    Route::apiResource('cliente-sistema', ClienteSistemaController::class)
      ->except(['store']);
  });

  Route::post('cliente-sistema', [ClienteSistemaController::class, 'store']);
  Route::get('cliente-sistemas/{clienteID}/cliente/id', [ClienteSistemaController::class, 'loadByCliente']);
});
