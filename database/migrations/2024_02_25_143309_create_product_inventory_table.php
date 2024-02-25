<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInventoryTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_inventory', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->unsignedBigInteger('inventory_id');
      $table->integer('quantity');
      $table->integer('reorder_level');
      $table->timestamps();

      $table
        ->foreign('product_id')
        ->references('id')
        ->on('products');
      $table
        ->foreign('inventory_id')
        ->references('id')
        ->on('inventories');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_inventory');
  }
}
