<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peripheral extends Model
{
  use HasFactory;

  protected $fillable = [
    'inventory', 'per_type', 'initial_warranty', 'final_warranty', 'days_warranty', 'observation', 'usersabs_id'
  ];

  public function usersabs(): belongsTo
  {
    return $this->belongsTo(User::class, 'usersabs_id')->withDefault();
  }

  public function screen(): hasOne
  {
    return $this->hasOne(Screen::class, 'peripheral_id', 'id')->with('brand');
  }

  protected $dates = [
    'initial_warranty',
    'final_warranty',
    'created_at',
    'updated_at',
  ];

  const PER_TYPE_SELECT = [
    'cpu'        => 'Cpu',
    'screen'     => 'Pantalla',
    'keyboard'   => 'Teclado',
    'pointer'    => 'Puntero',
    'speakers'   => 'Parlantes',
    'headphones' => 'Audífonos',
  ];
}