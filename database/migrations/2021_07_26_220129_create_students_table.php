<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
  public function up()
  {
    Schema::create('students', function (Blueprint $table) {
      $table->id();

      $table->foreignId('lesson_id')->constrained();
      $table->foreignId('section_id')->constrained();

      $table->string('name')->unique();
      $table->string('email')->unique();
      $table->string('address');
      $table->string('phone_number');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('students');
  }
}