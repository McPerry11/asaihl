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
      ->from('Association of Southeast Asian Institution of Higher Learning, Inc.')
      ->subject('2019 ASAIHL International Conference')
      ->view('email.registration', [
        'profile' => $this->profile,
        'price' => $this->profile->citizenship == 'LOCAL' ? 6000 : 300,
        'count' => \App\Registrant::with('companions')->where('profile_id', $this->profile->id )->first()->companions->count()
      ]);
  }
}
