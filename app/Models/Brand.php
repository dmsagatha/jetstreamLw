<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'slug'];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name',
      ],
    ];
  }

  public function screens(): hasMany
  {
    return $this->hasMany(Screen::class, 'brand_id', 'id');
  }
}