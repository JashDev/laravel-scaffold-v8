<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
  return response([
    'message' => 'Funcionando correctamente'
  ], 200);
});

// user ID and roles
Route::get('check/{userID}/roles', function ($userID) {
  return response([
    'userID' => $userID,
    'roles' => request()->roles,
    'u' => request()->auth
  ], 200);
})->middleware('auth.jwt:admin');

// solo user ID
Route::get('check/{userID}', function ($userID) {
  return response([
    'userID' => $userID,
    'roles' => request()->roles,
    'u' => request()->auth
  ], 200);
})->middleware('auth.jwt');

// solo roles
Route::get('check/roles/{idUser}', function ($idUser) {
  return response([
    'roles' => request()->roles,
    'u' => request()->auth,
    'idUser' => $idUser
  ], 200);
})->middleware('auth.jwt:admin');

// ni roles ni user ID
Route::get('check', function () {
  return response([
    'roles' => request()->roles,
    'u' => request()->auth
  ], 200);
})->middleware('auth.jwt');
