<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use Notifiable;
  use TwoFactorAuthenticatable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'role',
    'password',
    'profile_photo_path',
  ];

  public function peripherals(): hasMany
  {
    return $this->hasMany(Peripheral::class, 'usersabs_id', 'id');
  }

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'profile_photo_url',
  ];

  public function getImageUserAttribute()
  {
    return $this->profile_photo_path ?? 'images/default-user.png';
  }

  /**
   * Accesor - Para mostrar en las vistas
   */
  /* public function getRoleFullAttribute()
  {
    if ($this->role == 'admin') {
      return 'Administrador';
    } elseif ($this->role == 'user') {
      return 'Usuario';
    } elseif ($this->role == 'reviewer') {
      return 'Revisor';
    }
  } */
  public function getRoleFullAttribute(): string
  {
    if ($this->role === 'admin') {
      return 'Administrador';
    }

    return $this->role === 'reviewer' ? 'Revisor' : 'Usuario';
  }

  public function scopeRole($query, $role)
  {
    if ($role === '') {
      return;
    }

    return $query->whereRole($role);
  }
}