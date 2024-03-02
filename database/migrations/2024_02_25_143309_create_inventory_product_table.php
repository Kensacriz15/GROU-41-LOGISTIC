<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductTable extends Migration
{
    public function up()
    {
        Schema::create('inventory_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Add this line
            $table->unsignedBigInteger('inventory_id');
            $table->integer('quantity');
            $table->integer('reorder_level');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('inventory_id')
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
      Schema::dropIfExists('inventory_product');
  }
}
