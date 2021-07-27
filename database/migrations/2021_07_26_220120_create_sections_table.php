<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
  public function up()
  {
    Schema::create('sections', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();

      $table->foreignId('lesson_id')
            ->nullable()
            ->constrained()
            ->onUpdate('restrict')
            ->onDelete('set null');
      
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('sections');
  }
}