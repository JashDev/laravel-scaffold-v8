<?php

namespace App\Models\Incidencias;

use Illuminate\Support\Str;

class IncidenciaObserver
{
  public function creating(Incidencia $incidencia)
  {
    $incidencia->id = (string) Str::uuid();
  }
}
