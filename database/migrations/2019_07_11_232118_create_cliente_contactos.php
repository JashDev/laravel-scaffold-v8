<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteContactos extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cliente_contactos', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cliente_id');
      $table->string('dni', 8)->unique();
      $table->string('paterno');
      $table->string('materno');
      $table->string('nombres');
      $table->string('telefono');
      $table->string('email');
      $table->string('cargo')->nullable();
      $table->foreign('cliente_id')->references('id')->on('clientes');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cliente_contactos');
  }
}
