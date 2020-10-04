<?php

namespace App\Models\ClienteContactos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteContacto extends Model
{
  use HasFactory;

  protected $fillable = [
    'cliente_id',
    'dni',
    'paterno',
    'materno',
    'nombres',
    'telefono',
    'email',
    'cargo',
  ];

  protected $casts = [
    'created_at' => 'datetime:d/m/Y H:i:s',
    'updated_at' => 'datetime:d/m/Y H:i:s',
  ];
}
