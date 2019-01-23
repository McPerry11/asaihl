<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

  /**
   * @var array
   */
  protected $fillable = [
    'barcode',
    'email_address',
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
    'institution'    => null,
    'barcode'        => ''
  ];

  /**
   * @return mixed
   */
  protected function setBarcodeAttribute() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    do {
      $string = '';

      for ($i = 0; $i < 10; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
      }

    } while ($this->where('barcode', $string)->get()->isNotEmpty());

    $this->attributes['barcode'] = $string;
  }

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
