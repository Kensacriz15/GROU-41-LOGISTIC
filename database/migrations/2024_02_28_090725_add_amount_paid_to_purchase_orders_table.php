<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::table('purchase_orders', function (Blueprint $table) {
      $table->decimal('amount_paid', 10, 2)->nullable()->after('delivery_date');
  });
  }

    public function down(): void
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
        });
    }
};
