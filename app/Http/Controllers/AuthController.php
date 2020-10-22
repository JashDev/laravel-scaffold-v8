<?php

namespace App\Http\Controllers;

use App\Models\Users\UserRepository;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
  protected $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  protected function generateToken(Int $id)
  {
    $payload = [
      'iss' => env('JWT_ISS'),
      'id' => $id,
      'iat' => time(),
      'exp' => time() + (10 * 60),
    ];

    return JWT::encode($payload, env('JWT_SECRET'));
  }

  /**
   * Login usuario
   */
  public function login()
  {
    $dataLogin = request()->input();
    [$rules, $messages] = $this->userRepository->validateLogin($dataLogin);
    CheckValidate($dataLogin, $rules, $messages);

    $username = $dataLogin['username'];
    $password = $dataLogin['password'];

    $user = $this->userRepository->findByUsername($username);

    CheckModel($user, 'Nombre de usuario incorrecto');

    $passwordValid = $user->validPassword($password);

    if (!$passwordValid) {
      ThrowBadRequest('La contraseña es incorrecta');
    }

    return response([
      'user' => $user,
      'token' => $this->generateToken($user->id)
    ], 200);
  }
}
