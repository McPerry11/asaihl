<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('participants', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('profile_id');
      $table->foreign('profile_id')->references('id')->on('profiles');
      $table->timestamp('logged_at');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('participants');
  }
}
