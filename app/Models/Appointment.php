<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description', 'date', 'status', 'user_id'];

  public function user(): belongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function getStatusBadgeAttribute()
  {
    $badges = [
      'Scheduled' => 'red',
      'Closed'    => 'red',
    ];

    return $badges[$this->status];
  }

  public static function search($query)
  {
    return empty($query) ? static::query()
      : static::where('appointments.name', 'like', '%' . $query . '%')
        ->orWhere('appointments.description', 'like', '%' . $query . '%');
  }
}