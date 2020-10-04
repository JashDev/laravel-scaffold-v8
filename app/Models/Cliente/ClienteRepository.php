<?php

namespace App\Models\Cliente;

use Exception;

class ClienteRepository
{
  protected $cliente;

  public function __construct(Cliente $cliente)
  {
    $this->cliente = $cliente;
  }

  /**
   * Obtener un cliente por su numero de documento
   */
  public function findByDocumento($documento)
  {
    $cliente = $this->cliente->where('documento', $documento)
      ->first();
    return $cliente;
  }

  /**
   * Registrar un nuevo Cliente
   */
  public function newCliente(Cliente $cliente): ?Cliente
  {
    try {
      $isRegistered = $cliente->save();

      if (!$isRegistered) {
        ThrowBadRequest('No se pudo registrar el cliente');
      }

      return $cliente;
    } catch (Exception $e) {
      ThrowBadRequest('Error al registrar cliente', $e->getMessage());
    }
  }

  /**
   * Validar la información que se recibe para crear un nuevo cliente
   */
  public function validateNewCliente(): array
  {
    $rules = [
      'documento' => 'required|unique:clientes',
      'razon_social' => 'required',
      'tipo_documento' => 'required|in:DNI,RUC',
    ];

    $messages = [
      'documento.required' => 'Documento obligatorio',
      'documento.unique' => 'El documento ya se encuentra registrado',
      'razon_social.required' => 'Razón social obligatoria',
      'tipo_documento.required' => 'Tipo de documento obligatorio',
      'tipo_documento.in' => 'Tipo de documento no válido',
    ];

    return [$rules, $messages];
  }
}
