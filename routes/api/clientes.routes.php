<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
  Route::group(['middleware' => 'auth.jwt'], function () {
    Route::apiResource('cliente', ClienteController::class)
      ->except(['store']);
  });

  Route::post('cliente', [ClienteController::class, 'store']);
  Route::get('clientes/{documento}/documento', [ClienteController::class, 'getByDocumento']);
});
