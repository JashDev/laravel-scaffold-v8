<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
  public function __construct($message, $code)
  {
    parent::__construct($message, $code);
  }

  public function render()
  {
    return response([
      'message' => parent::getMessage(),
    ], parent::getCode());
  }
}
