<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientes extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clientes', function (Blueprint $table) {
      $table->id();
      $table->string('codigo')->nullable()->unique();
      $table->string('documento', 11)->unique();
      $table->string('razon_social', 200);
      $table->string('direccion', 150)->nullable();
      $table->string('phone', 20)->nullable();
      $table->string('email', 150)->nullable();
      $table->text('comentarios')->nullable();
      $table->enum('tipo_documento', ['DNI', 'RUC']);
      $table->string('no_ip')->nullable();
      $table->string('router_password')->nullable();
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
    Schema::dropIfExists('clientes');
  }
}
