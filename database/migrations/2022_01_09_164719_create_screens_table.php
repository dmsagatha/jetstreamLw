<?php

use App\Models\Brand;
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
      $table->string('active');
      
      $table->foreignIdFor(Brand::class)->constrained();

      // sortable
      $table->unsignedBigInteger("sort")->nullable();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('screens');
  }
}