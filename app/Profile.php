<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'barcode',
    'email',
    'first_name',
    'middle_initial',
    'last_name',
    'contact_number',
    'institution'
  ];

  /**
   * @var array
   */
  protected $attributes = [
    'contact_number' => null,
    'institution'    => null
  ];

  /**
   * @return mixed
   */
  public function participants() {
    return $this->hasMany('App\Participant');
  }

  /**
   * @return mixed
   */
  public function registrants() {
    return $this->hasMany('App\Registrant');
  }

  /**
   * @return mixed
   */
  public function companions() {
    return $this->hasMany('App\Companion');
  }
}
