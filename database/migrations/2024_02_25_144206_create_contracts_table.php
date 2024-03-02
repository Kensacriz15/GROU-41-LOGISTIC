<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contracts', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('bidding_id');
      $table->unsignedBigInteger('vendor_id');
      $table->unsignedBigInteger('product_id');
      $table->integer('quantity');
      $table->decimal('price', 10, 2);
      $table->dateTime('delivery_date');
      $table->text('payment_terms');
      $table->enum('status', ['pending', 'active', 'completed', 'terminated']);
      $table->timestamps();

      $table
      ->foreign('bidding_id')
      ->references('id')
      ->on('biddings')
      ->onDelete('cascade');
      $table
        ->foreign('vendor_id')
        ->references('id')
        ->on('vendors');
      $table
        ->foreign('product_id')
        ->references('id')
        ->on('products');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('contracts');
  }
}
