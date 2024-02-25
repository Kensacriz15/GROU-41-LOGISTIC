<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetRequestsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('budget_requests', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->integer('quantity');
      $table->decimal('total_cost', 10, 2);
      $table->text('justification');
      $table->enum('status', ['pending', 'approved', 'rejected']);
      $table->timestamps();

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
    Schema::dropIfExists('budget_requests');
  }
}
