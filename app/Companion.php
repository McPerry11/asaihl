<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companion extends Model {

  /**
   * @return mixed
   */
  public function profile() {
    return $this->belongsTo('App\Profile', 'profile_id');
  }
}
