<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  use HasFactory;

  protected $fillable = [
    'name', 'email', 'address', 'phone_number', 'lesson_id', 'section_id'
  ];

  public function lesson()
  {
    return $this->belongsTo(Lesson::class);
  }

  public function section()
  {
    return $this->belongsTo(Section::class);
  }
}