<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'profile_id'
  ];

  /**
   * @return mixed
   */
  public function profile() {
    return $this->belongsTo('App\Profile', 'profile_id');
  }
}
