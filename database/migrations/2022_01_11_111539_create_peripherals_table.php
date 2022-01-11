<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeripheralsTable extends Migration
{
  public function up()
  {
    Schema::create('peripherals', function (Blueprint $table) {
      $table->id();
      $table->string('inventory')->unique();
      $table->string('per_type');

      $table->foreignId('usersabs_id')->references('id')->on('users');

      $table->date('initial_warranty')->nullable();
      $table->date('final_warranty')->nullable();
      $table->integer('days_warranty')->nullable();
      $table->string('observation')->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('peripherals');
  }
}