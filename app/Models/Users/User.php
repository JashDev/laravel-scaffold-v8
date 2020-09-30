<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
  use HasFactory;

  const IS_ADMIN_DEFAULT = false;

  protected $table = 'empleados';

  protected $primaryKey = 'dni';

  public $incrementing = false;

  protected $keyType = 'string';

  protected $hidden = ['password'];

  protected $fillable = [
    'dni',
    'password',
    'paterno',
    'materno',
    'nombres',
    'phone',
    'email',
    'day',
    'month',
  ];

  protected $attributes = [
    'admin' => self::IS_ADMIN_DEFAULT,
  ];

  protected $casts = [
    'created_at' => 'datetime:d/m/Y H:m:s',
    'updated_at' => 'datetime:d/m/Y H:m:s',
    'admin' => 'bool',
  ];

  protected static function boot()
  {
    parent::boot();
    User::observe(UserObserver::class);
  }

  /**
   * Apunta todos los escopes al UserBuilder
   */
  public function newEloquentBuilder($query): UserBuilder
  {
    return new UserBuilder($query);
  }

  /**
   * Verficar que la contraseña del usuario sea válida
   */
  public function validPassword($password)
  {
    return Hash::check($password, $this->password);
  }
}
