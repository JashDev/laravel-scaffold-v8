<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleados extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('empleados', function (Blueprint $table) {
      $table->string('dni', 8)->primary();
      $table->string('paterno');
      $table->string('materno');
      $table->string('nombres');
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
      $table->string('password');
      $table->boolean('admin')->default(false);
      $table->integer('day')->unsigned();
      $table->integer('month')->unsigned();
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
    Schema::dropIfExists('empleados');
  }
}
