<?php

namespace App\Models\ClienteContactos;

use Exception;

class ClienteContactoRepository
{
  protected $clienteContacto;

  public function __construct(ClienteContacto $clienteContacto)
  {
    $this->clienteContacto = $clienteContacto;
  }

  /**
   * Buscar contacto de cliente por número de DNI
   */
  public function findByDni(string $dni): ?ClienteContacto
  {
    $clienteContacto = $this->clienteContacto->where('dni', $dni)
      ->first();

    return $clienteContacto;
  }

  /**
   * Registrar un nuevo Contacto Cliente
   */
  public function newClienteContacto(ClienteContacto $clienteContacto): ?ClienteContacto
  {
    try {
      $isRegistered = $clienteContacto->save();

      if (!$isRegistered) {
        ThrowBadRequest('No se pudo registrar el contacto de cliente');
      }

      return $clienteContacto;
    } catch (Exception $e) {
      ThrowBadRequest('Error al registrar contacto de cliente', $e->getMessage());
    }
  }

  /**
   * Validar la información que se recibe para crear un nuevo contacto de cliente
   */
  public function validateNewClienteContacto(): array
  {
    $rules = [
      'cliente_id' => 'required',
      'dni' => 'required|unique:cliente_contactos',
      'paterno' => 'required',
      'materno' => 'required',
      'nombres' => 'required',
      'telefono' => 'required',
      'email' => 'required|email',
    ];

    $messages = [
      'cliente_id.required' => 'El ID del cliente es obligatorio',
      'dni.required' => 'DNI obligatorio',
      'dni.unique' => 'DNI ya registrado',
      'paterno.required' => 'Apellido paterno obligatorio',
      'materno.required' => 'Apellido materno obligatorio',
      'nombres.required' => 'Nombres obligatorios',
      'telefono.required' => 'Número de teléfono obligatorio',
      'email.required' => 'Email obligatorio',
      'email.email' => 'Email inválido',
    ];

    return [$rules, $messages];
  }
}
