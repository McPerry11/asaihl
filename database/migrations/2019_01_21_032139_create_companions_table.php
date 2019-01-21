<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('companions', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('registrant_id');
      $table->foreign('registrant_id')->references('id')->on('registrants');
      $table->unsignedInteger('profile_id');
      $table->foreign('profile_id')->references('id')->on('profiles');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('companions');
  }
}
