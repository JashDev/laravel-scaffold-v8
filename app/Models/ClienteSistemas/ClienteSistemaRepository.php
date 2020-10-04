<?php

namespace App\Models\ClienteSistemas;

use Exception;

class ClienteSistemaRepository
{
  protected $clienteSistema;

  public function __construct(ClienteSistema $clienteSistema)
  {
    $this->clienteSistema = $clienteSistema;
  }

  /**
   * Cargar todos los sistemas de un cliente
   */
  public function loadByCliente($clienteID)
  {
    $clienteSistemas = $this->clienteSistema->where('cliente_id', $clienteID)
      ->get();

    return $clienteSistemas;
  }

  /**
   * Registrar un nuevo Sistema Cliente
   */
  public function newClienteSistema(ClienteSistema $clienteSistema): ?ClienteSistema
  {
    try {
      $isRegistered = $clienteSistema->save();

      if (!$isRegistered) {
        ThrowBadRequest('No se pudo registrar el sistema del cliente');
      }

      return $clienteSistema;
    } catch (Exception $e) {
      ThrowBadRequest('Error al registrar sistema del cliente', $e->getMessage());
    }
  }

  /**
   * Validar la información que se recibe para crear un nuevo sistema de cliente
   */
  public function validateNewClienteSistema(): array
  {
    $rules = [
      'cliente_id' => 'required',
      'nombre' => 'required',
    ];

    $messages = [
      'cliente_id.required' => 'El ID del cliente es obligatorio',
      'nombre.required' => 'Nombre del sistema obligatorio',
    ];

    return [$rules, $messages];
  }
}
