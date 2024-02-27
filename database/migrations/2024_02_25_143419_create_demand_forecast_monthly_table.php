<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandForecastMonthlyTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('demand_forecast_monthly', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->year('year');
      $table->integer('month');
      $table->integer('quantity');
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
    Schema::dropIfExists('demand_forecast_monthly');
  }
}
