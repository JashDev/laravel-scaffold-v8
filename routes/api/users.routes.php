<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
  Route::group(['middleware' => 'auth.jwt'], function () {
    Route::resource('user', UserController::class);
  });
});
