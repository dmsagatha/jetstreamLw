<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  use HasFactory;

  public $orderable = [
    'id',
    'company_name',
    'company_address',
    'company_website',
    'company_email',
  ];

  public $filterable = [
    'id',
    'company_name',
    'company_address',
    'company_website',
    'company_email',
  ];

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
}