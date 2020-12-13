<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class QrResult extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id', 'name', 'type', 'form_data'
  ];
  
  public function getCreatedAtAttribute($value)
  {
    return Verta($value)->formatGregorian('Y-m-d H:i:s');
  }
}
