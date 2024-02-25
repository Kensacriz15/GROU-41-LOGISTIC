<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('invoices', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('vendor_id');
      $table->unsignedBigInteger('purchase_order_id');
      $table->decimal('amount', 10, 2);
      $table->dateTime('invoice_date');
      $table->dateTime('due_date');
      $table->timestamps();

      $table
        ->foreign('vendor_id')
        ->references('id')
        ->on('vendors');
      $table
        ->foreign('purchase_order_id')
        ->references('id')
        ->on('purchase_orders');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('invoices');
  }
}
