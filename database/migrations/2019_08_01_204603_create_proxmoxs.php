<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProxmoxs extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('proxmoxes', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cliente_id');
      $table->foreign('cliente_id')->references('id')->on('clientes');
      $table->string('link');
      $table->string('usuario');
      $table->string('password');
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
    Schema::dropIfExists('proxmoxes');
  }
}
