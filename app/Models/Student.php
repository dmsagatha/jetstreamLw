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
    return $this->belongsTo(Lesson::class, 'lesson_id');
  }

  public function section()
  {
    return $this->belongsTo(Section::class);
  }

  public function scopeSearch($query, $term)
  {
    $term = "%$term%";

    $query->where(function($query) use ($term) {
      $query->where('name', 'like', $term)
            ->orWhere('email', 'like', $term)
            ->orWhere('phone_number', 'like', $term)
            ->orWhere('address', 'like', $term)
            ->orWhereHas('lesson', function ($query) use ($term) {
              $query->where('name', 'like', $term);
            })
            ->orWhereHas('section', function ($query) use ($term) {
              $query->where('name', 'like', $term);
            });
    });
  }
}