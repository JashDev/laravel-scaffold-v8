<?php

use App\Http\Controllers\ClienteContactoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
  Route::group(['middleware' => 'auth.jwt'], function () {
    Route::apiResource('cliente-contacto', ClienteContactoController::class)
      ->except(['store']);
  });

  Route::post('cliente-contacto', [ClienteContactoController::class, 'store']);
  Route::get('cliente-contactos/{dni}/dni', [ClienteContactoController::class, 'findByDni']);
});
