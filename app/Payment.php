<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
  /**
   * @return mixed
   */
  public function registrant() {
    return $this->belongsTo('App\Registrant', 'registrant_id');
  }
}
