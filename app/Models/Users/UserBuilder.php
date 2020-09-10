<?php

namespace App\Models\Users;

use App\BaseBuilder;

class UserBuilder extends BaseBuilder
{
  /**
   * Scope que filtra los usuarios según su username
   */
  public function usernameScope($username)
  {
    return $this->where('username', $username);
  }
}
