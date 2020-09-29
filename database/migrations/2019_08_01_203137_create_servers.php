<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServers extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('servers', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cliente_id');
      $table->foreign('cliente_id')->references('id')->on('clientes');
      $table->string('ip', 15);
      $table->integer('port')->unsigned()->default(22);
      $table->string('usuario');
      $table->string('password');
      $table->string('no_ip')->nullable();
      $table->string('teamviewer_user')->nullable();
      $table->string('teamviewer_password')->nullable();
      $table->string('anydesk_user')->nullable();
      $table->string('anydesk_password')->nullable();
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
    Schema::dropIfExists('servers');
  }
}
