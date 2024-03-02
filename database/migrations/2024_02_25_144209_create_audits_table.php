<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateauditsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('audits', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('purchase_order_id');
      $table->text('description');
      $table->enum('status', ['pending', 'completed']);
      $table->timestamps();

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
    Schema::dropIfExists('audits');
  }
}
