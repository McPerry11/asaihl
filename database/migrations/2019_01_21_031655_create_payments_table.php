<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('payments', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedInteger('registrant_id');
      $table->foreign('registrant_id')->references('id')->on('registrants');
      $table->string('payment_file');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('payments');
  }
}
