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

  public function newEloquentBuilder($query): ClienteBuilder
  {
    return new ClienteBuilder($query);
  }

  public function setRazonSocialAttribute($value)
  {
    $this->attributes['razon_social'] = strtoupper($value);
  }
}
