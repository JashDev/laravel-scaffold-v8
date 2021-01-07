<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\SendMailable;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
  public function sendEmail()
  {
    // Mail::to('dev.jsifuentes@gmail.com')->send(new SendMailable());
    dispatch(new SendEmailJob());
    return response([
      'message' => 'mensaje enviado'
    ], Response::HTTP_OK);
  }
}
