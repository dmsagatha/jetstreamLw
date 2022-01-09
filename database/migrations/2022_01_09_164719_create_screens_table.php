<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreensTable extends Migration
{
  public function up()
  {
    Schema::create('screens', function (Blueprint $table) {
      $table->id();
      $table->string('serial')->unique();
      $table->string('size');
      
      $table->foreignId('brand_id')->constrained();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('screens');
  }
}