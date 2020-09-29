<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteSistemasTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cliente_sistemas', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cliente_id');
      $table->string('nombre', 100);
      $table->text('descripcion');
      $table->date('fecha_inicio')->nullable();
      $table->text('comentarios')->nullable();
      $table->string('encargado_dni', 8);
      $table->foreign('encargado_dni')->references('dni')->on('empleados');
      $table->timestamps();

      $table->foreign('cliente_id')->references('id')->on('clientes');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('cliente_sistemas');
  }
}
