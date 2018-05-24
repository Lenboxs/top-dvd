<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'series';

  public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
