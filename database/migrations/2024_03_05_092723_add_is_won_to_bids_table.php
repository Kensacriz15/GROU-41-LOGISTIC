<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::table('bids', function (Blueprint $table) {
          $table->boolean('is_won')->default(false); // Assuming boolean type
      });
  }

  public function down()
  {
      Schema::table('bids', function (Blueprint $table) {
          $table->dropColumn('is_won');
      });
  }

};
