<?php

use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
  Route::group(['middleware' => 'auth.jwt'], function () {
    Route::apiResource('incidencia', IncidenciaController::class)
      ->except(['store', 'show']);
  });

  Route::post('incidencia', [IncidenciaController::class, 'store']);
  Route::get('incidencia/{id}', [IncidenciaController::class, 'show']);
});
