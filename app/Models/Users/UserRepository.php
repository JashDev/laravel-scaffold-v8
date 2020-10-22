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
   *  Encuentra un usuario segun su ID
   */
  public function findById($id): ?User
  {
    $user = $this->user->find($id);

    return $user;
  }

  /**
   *  Encuentra un usuario segun su username
   */
  public function findByUsername($username): ?User
  {
    $user = $this->user->where('username', $username)
      ->first();

    return $user;
  }

  /**
   * Registra un nuevo usuario
   */
  public function newUser(User $user): ?User
  {
    try {
      $isRegistered = $user->save();

      if (!$isRegistered) {
        ThrowBadRequest('No se pudo registrar el usuario');
      }

      return $user;
    } catch (Exception $e) {
      // ThrowBadRequest('Error al registrar usuario');
      ThrowBadRequest($e->getMessage());
    }
  }

  /**
   * Validar la información que se recibe para crear un nuevo usuario
   */
  public function validateNewUsuario()
  {
    $rules = [
      'username' => 'required|unique:users',
      'password' => 'required'
    ];

    $messages = [
      'username.required' => 'El nombre de usuario es obligatorio',
      'username.unique' => 'El nombre de usuario ya se encuentra registrado',
      'password.required' => 'Contraseña obligatoria'
    ];

    return [$rules, $messages];
  }

  /**
   * Validar la información que se recibe para el login de un empleado
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
