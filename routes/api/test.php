<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
  return response([
    'message' => 'Funcionando correctamente'
  ], 200);
});
