<?php

namespace App\Models\Users;

use Exception;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
  public function creating(User $user)
  {
    $user->password = Hash::make($user->password);
    if (false) {
      throw new Exception();
      // Si un hook retorna falso la operacion no se realiza
      return false;
    }
  }
}
