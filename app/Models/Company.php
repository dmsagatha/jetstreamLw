<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  protected $fillable = [
    'company_name',
    'company_address',
    'company_website',
    'company_email',
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  public static function search($query)
  {
    return empty($query) ? static::query()
        : static::where('company_name', 'like', '%' . $query . '%')
          ->orWhere('company_address', 'like', '%' . $query . '%')
          ->orWhere('company_website', 'like', '%' . $query . '%')
          ->orWhere('company_email', 'like', '%' . $query . '%');
  }
}