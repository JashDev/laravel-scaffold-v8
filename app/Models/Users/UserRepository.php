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
   * Lista todos los empleados
   */
  public function allUsers()
  {
    $users = $this->user->all();
    return $users;
  }

  /**
   *  Encuentra un empleado segun su dni
   */
  public function findByDni(string $dni): ?User
  {
    $user = $this->user->dniScope($dni)
      ->first();

    return $user;
  }

  /**
   * Registra un nuevo empleado
   */
  public function newUser(User $user): ?User
  {
    try {
      $isRegistered = $user->save();

      if (!$isRegistered) {
        ThrowBadRequest('No se pudo registrar el empleado');
      }

      return $user;
    } catch (Exception $e) {
      // ThrowBadRequest('Error al registrar empleado');
      ThrowBadRequest($e->getMessage());
    }
  }

  /**
   * Validar la información que se recibe para crear un nuevo empleado
   */
  public function validateNewEmpleado()
  {
    $rules = [
      'dni' => 'required|unique:empleados',
      'paterno' => 'required',
      'materno' => 'required',
      'nombres' => 'required',
      'day' => 'required',
      'month' => 'required',
      'password' => 'required'
    ];

    $messages = [
      'dni.required' => 'DNI obligatorio',
      'dni.unique' => 'El DNI ya se encuentra registrado',
      'paterno.required' => 'El apellido paterno es obligatorio',
      'materno.required' => 'El apellido materno es obligatorio',
      'nombres.required' => 'Nombres es obligatorios',
      'day.required' => 'El día de nacimiento es obligatorio',
      'month.required' => 'El mes de nacimiento es obligatorio',
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
      'dni' => 'required',
      'password' => 'required'
    ];

    $messages = [
      'dni.required' => 'DBI obligatorio',
      'password.required' => 'Contraseña obligatoria'
    ];

    return [$rules, $messages];
  }
}
