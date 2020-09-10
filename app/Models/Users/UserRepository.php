<?php

namespace App\Models\Users;

use Exception;

class UserRepository
{
  protected $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Lista todos los usuarios
   */
  public function allUsers()
  {
    $users = $this->user->all();
    return $users;
  }

  /**
   *  Encuentra un usuario segun su username
   */
  public function findByUsername(string $username): ?User
  {
    $user = $this->user->usernameScope($username)
      ->first();

    return $user;
  }

  /**
   * Registra un nuevo usuario
   */
  public function newUser($userData)
  {
    $user = new User($userData);

    try {
      $user->save();
      return $user;
    } catch (Exception $e) {
      ThrowBadRequest('Error al registrar usuario');
    }
  }

  /**
   * Validar la información que se recibe para crear un nuevo usuario
   */
  public function validateNewUser()
  {
    $rules = [
      'username' => 'required|unique:users',
      'password' => 'required'
    ];

    $messages = [
      'username.required' => 'Nombre de usuario obligatorio',
      'username.unique' => 'El nombre de usuario ya existe',
      'password.required' => 'Contraseña obligatoria'
    ];

    return [$rules, $messages];
  }

  /**
   * Validar la información que se recibe para el login de un usuario
   */
  public function validateLogin()
  {
    $rules = [
      'username' => 'required',
      'password' => 'required'
    ];

    $messages = [
      'username.required' => 'Nombre de usuario obligatorio',
      'password.required' => 'Contraseña obligatoria'
    ];

    return [$rules, $messages];
  }
}
