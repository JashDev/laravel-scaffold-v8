<?php

namespace App\Models\Incidencias;

use Exception;

class IncidenciaRepository
{
  protected $incidencia;

  public function __construct(Incidencia $incidencia)
  {
    $this->incidencia = $incidencia;
  }

  /**
   * Registrar una nueva incidencia
   */
  public function newIncidencia(Incidencia $incidencia): ?Incidencia
  {
    try {
      $isRegistered = $incidencia->save();

      if (!$isRegistered) {
        ThrowBadRequest('No se pudo registrar la incidencia');
      }

      return $incidencia;
    } catch (Exception $e) {
      ThrowBadRequest('Error al registrar la incidencia', $e->getMessage());
    }
  }

  public function findByID(string $id): ?Incidencia
  {
    $incidencia = $this->incidencia->find($id);

    return $incidencia;
  }

  /**
   * Validar la información que se recibe para crear una nueva incidencia
   */
  public function validateNewIncidencia(): array
  {
    $rules = [
      'cliente_contacto_id' => 'required',
      'detalles' => 'required',
      'sistema_id' => 'required',
    ];

    $messages = [
      'cliente_contacto_id.required' => 'El contacto del cliente es obligatorio',
      'detalles.required' => 'Los detalles de la incidencia son obligatorios',
      'sistema_id.required' => 'El sistema es obligatorio',
    ];

    return [$rules, $messages];
  }
}
