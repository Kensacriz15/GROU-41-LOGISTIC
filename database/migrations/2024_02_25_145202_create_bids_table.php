<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration
{
  public function up()
  {
    Schema::create('bids', function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId('bidding_id')
        ->constrained()
        ->onDelete('cascade');
      $table
        ->foreignId('vendor_id')
        ->constrained()
        ->onDelete('cascade');
      $table->decimal('price', 10, 2);
      $table->integer('delivery_time');
      $table->text('terms_and_conditions');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::table('bids', function (Blueprint $table) {
      $table->dropForeign(['bidding_id']);
      $table->dropForeign(['vendor_id']);
    });
  }
}
