<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
  CriticLog('critico', [
    'messsage' => 'mensjae de error en el aAPI'
  ]);

  return response([
    'message' => 'probando ando'
  ], 200);
});
