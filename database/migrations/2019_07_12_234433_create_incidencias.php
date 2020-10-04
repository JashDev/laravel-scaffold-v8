<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidencias extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('incidencias', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cliente_contacto_id');
      $table->string('detalles');
      $table->string('observaciones')->nullable();
      $table->unsignedBigInteger('estado_id')->nullable();
      $table->date('fecha_entrega')->nullable();
      $table->string('encargado_dni', 8)->nullable();
      $table->unsignedBigInteger('sistema_id');
      $table->timestamps();
      $table->softDeletes();

      $table->foreign('cliente_contacto_id')->references('id')->on('cliente_contactos');
      $table->foreign('estado_id')->references('id')->on('incidencia_estados');
      $table->foreign('encargado_dni')->references('dni')->on('empleados');
      $table->foreign('sistema_id')->references('id')->on('cliente_sistemas');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('incidencias');
  }
}
