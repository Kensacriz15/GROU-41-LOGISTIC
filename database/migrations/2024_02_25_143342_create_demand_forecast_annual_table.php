<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandForecastAnnualTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('demand_forecast_annual', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id');
      $table->year('year');
      $table->integer('january');
      $table->integer('february');
      // ... add additional months
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
    Schema::dropIfExists('demand_forecast_annual');
  }
}
