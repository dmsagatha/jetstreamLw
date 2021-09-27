<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'pages', 'author'];

  public static function search($query)
  {
    return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
              ->orWhere('pages', 'like', '%' . $query . '%')
              ->orWhere('author', 'like', '%' . $query . '%');
  }
}