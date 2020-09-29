<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabases extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('databases', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cliente_id');
      $table->foreign('cliente_id')->references('id')->on('clientes');
      $table->string('ip', 15);
      $table->integer('port')->unsigned()->default(3306);
      $table->string('usuario');
      $table->string('password');
      $table->string('nombre');
      $table->unsignedBigInteger('sistema_id')->nullable();
      $table->foreign('sistema_id')->references('id')->on('cliente_sistemas');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('databases');
  }
}
