<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
  public function up()
  {
    Schema::create('people', function (Blueprint $table) {
      $table->id();
      $table->string('name', 100);
      $table->boolean('active')->default(false);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('people');
  }
}