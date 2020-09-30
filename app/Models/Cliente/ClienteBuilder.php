<?php

namespace App\Models\Cliente;

use App\BaseBuilder;

class ClienteBuilder extends BaseBuilder
{
  /**
   * Scope que filtra los usuarios según su documento
   */
  public function documentoScope($documento)
  {
    return $this->where('documento', $documento);
  }
}
