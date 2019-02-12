<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'payment_file', 'remarks'
  ];

  /**
   * @var array
   */
  protected $attributes = [
    'payment_file' => null,
    'remarks'      => null
  ];

  /**
   * @return mixed
   */
  public function registrant() {
    return $this->belongsTo('App\Registrant', 'registrant_id');
  }
}
