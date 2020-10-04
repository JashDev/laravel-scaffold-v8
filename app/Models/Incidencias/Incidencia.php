<?php

namespace App\Models\Incidencias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
  use HasFactory;

  public $incrementing = false;

  protected $keyType = 'string';

  protected $fillable = [
    'cliente_contacto_id',
    'detalles',
    'observaciones',
    'estado_id',
    'fecha_entrega',
    'encargado_dni',
    'sistema_id',
  ];

  protected $casts = [
    'created_at' => 'datetime:d/m/Y H:i:s',
    'updated_at' => 'datetime:d/m/Y H:i:s',
  ];

  protected static function boot()
  {
    parent::boot();
    Incidencia::observe(IncidenciaObserver::class);
  }
}
