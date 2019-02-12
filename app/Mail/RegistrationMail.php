<?php

namespace App\Mail;

use App\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable {
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($profile) {
    $this->profile = $profile;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build() {
    return $this
      ->subject('2019 ASAIHL International Conference')
      ->view('email.registration', ['profile' => $this->profile, 'price' => $this->profile->citizenship == 'LOCAL' ? '₱6000.00' : '$300.00']);
  }
}
