<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
  public function up()
  {
    Schema::create('appointments', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->date('date');
      $table->text('description');
      $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('appointments');
  }
}