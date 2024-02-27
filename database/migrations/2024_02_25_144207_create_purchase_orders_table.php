<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('purchase_orders', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('contract_id');
      $table->integer('quantity');
      $table->dateTime('delivery_date');
      $table->timestamps();

      $table
        ->foreign('contract_id')
        ->references('id')
        ->on('contracts');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('purchase_orders');
  }
}
