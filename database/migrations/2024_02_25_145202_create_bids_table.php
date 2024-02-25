<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('bids', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('bidding_id');
      $table->unsignedBigInteger('vendor_id');
      $table->decimal('price', 10, 2);
      $table->integer('delivery_time');
      $table->text('terms_and_conditions');
      $table->timestamps();

      $table
        ->foreign('bidding_id')
        ->references('id')
        ->on('biddings');
      $table
        ->foreign('vendor_id')
        ->references('id')
        ->on('vendors');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('bids');
  }
}