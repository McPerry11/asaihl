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
      $table->enum('type', ['PAYPAL', 'PAYMENT_SLIP']);
      $table->string('payment_file')->nullable();
      $table->float('amount')->nullable();
      $table->string('remarks')->nullable();
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
