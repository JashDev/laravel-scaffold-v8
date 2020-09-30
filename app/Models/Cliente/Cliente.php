<?php

namespace App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  use HasFactory;

  protected $fillable = [
    'codigo',
    'documento',
    'razon_social',
    'direccion',
    'phone',
    'email',
    'comentarios',
    'tipo_documento',
    'no_ip',
    'router_password',
  ];

  protected $casts = [
    'created_at' => 'datetime:d/m/Y H:m:s',
    'updated_at' => 'datetime:d/m/Y H:m:s',
    'created_by_cliente' => 'bool'
  ];

  public function newEloquentBuilder($query): ClienteBuilder
  {
    return new ClienteBuilder($query);
  }

  public function setRazonSocialAttribute($value)
  {
    $this->attributes['razon_social'] = strtoupper($value);
  }
}
