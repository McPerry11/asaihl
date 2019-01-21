<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {
  /**
   * @var array
   */
  protected $fillable = [
    'content'
  ];
}
