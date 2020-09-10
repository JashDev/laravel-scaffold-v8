<?php

namespace App\Http\Middleware;

use App\Models\Users\User;
use Closure;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    $token = $request->headers->get('token');

    if (!$token) {
      return response([
        'message' => 'Autorización no encontrada.',
      ], Response::HTTP_UNAUTHORIZED);
    }

    try {
      $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
    } catch (ExpiredException $e) {
      return response([
        'message' => 'Su autorización ha expirado.',
        'errorDetail' => $e->getMessage()
      ], Response::HTTP_UNAUTHORIZED);
    } catch (Exception $e) {
      return response([
        'message' => 'No se ha podido reconocer su autorizacion.',
      ], Response::HTTP_UNAUTHORIZED);
    }

    $user = User::find($credentials->id);

    if (!$user) {
      return response([
        'message' => 'Usted no esta autorizado a realizar esta acción',
      ], Response::HTTP_BAD_REQUEST);
    }

    // TODO: userID only
    // $userID = request('userID') ?? null;

    // if ($userID && $userID != $user->id) {
    //     return response()
    //         ->json([
    //             'message' => 'Usted no esta autorizado a realizar esta acción',
    //         ], 400);
    // }

    $request->auth = $user;

    return $next($request);
  }
}
