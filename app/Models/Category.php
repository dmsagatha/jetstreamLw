<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'status'];

  public function scopeActive($query)
  {
    return $query->where('status', 1);
  }

  /**
   * Relación Uno a Muchos
   * Una Categoría puede tener 1 o varios Productos
   */
  public function products()
  {
    return $this->hasMany(Product::class);
  }
}