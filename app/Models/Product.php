<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'price', 'description', 'category_id'];

  /**
   * Relación Uno a Muchos (Inversa)
   * Un Producto pertenece a 1 Categoría
   */
  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  /**
   * https://laracasts.com/discuss/channels/livewire/livewire-relationships?page=1&replyId=571122
   */
  public static function search($query)
  {
    return empty($query) ? static::query()
            : static::where('products.name', 'like', '%' . $query . '%')
              ->orWhere('products.description', 'like', '%' . $query . '%')
              ->orWhere('categories.name', 'like', '%' . $query . '%');
  }

  /* public function scopeSearch($query, $term)
  {
    $term = "%$term%";

    $query->where(function ($query) use ($term) {
      $query->where('name', 'like', $term)
        ->orWhere('price', 'like', $term)
        ->orWhere('description', 'like', $term)
        ->orWhereHas('category', function ($query) use ($term)
        {
          $query->where('name', 'like', $term);
        });
    });
  } */

  /**
   * https://stackoverflow.com/questions/35783539/laravel-multiple-where-condition-in-wherehas-callback
   */
  /* public static function scopeSearch($query, $term)
  {
    return Product::whereHas('category', function($query) use ($term) {
        $query->where(function ($qc) use ($term) {
          $qc->where('name', 'like', '%' . $term . '%');
        });
      })
      ->orWhere('products.name', 'like', '%' . $term . '%')
      ->orWhere('products.price', 'like', '%' . $term . '%')
      ->orWhere('products.description', 'like', '%' . $term . '%');
  } */
}