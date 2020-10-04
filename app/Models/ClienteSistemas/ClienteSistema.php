<?php

namespace App\Models\ClienteSistemas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteSistema extends Model
{
  use HasFactory;

  protected $fillable = [
    'cliente_id',
    'nombre',
    'descripcion',
    'fecha_inicio',
    'comentarios',
    'encargado_dni',
  ];

  protected $casts = [
    'created_at' => 'datetime:d/m/Y H:i:s',
    'updated_at' => 'datetime:d/m/Y H:i:s',
  ];
}
