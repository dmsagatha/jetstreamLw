<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  use HasFactory;

  public $fillable = ['name', 'description', 'date'];

  public static function search($query)
  {
    return empty($query) ? static::query()
      : static::where('appointments.name', 'like', '%' . $query . '%')
        ->orWhere('appointments.description', 'like', '%' . $query . '%');
  }
}