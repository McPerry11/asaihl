<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('profiles', function (Blueprint $table) {
      $table->increments('id');
      $table->string('barcode')->unique();
      $table->string('email_address');
      $table->string('first_name');
      $table->string('middle_initial');
      $table->string('last_name');
      $table->string('contact_number')->nullable();
      $table->string('institution')->nullable();
      $table->enum('citizenship', ['LOCAL', 'FOREIGN']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('profiles');
  }
}
