<?php

namespace App\Models\Cliente;

class ClienteRepository
{
  protected $cliente;

  public function __construct(Cliente $cliente)
  {
    $this->cliente = $cliente;
  }
}
