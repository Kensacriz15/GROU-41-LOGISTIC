<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('unit_price', 10, 2)->default(0.0);
            $table->date('production_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->unsignedBigInteger('product_category_id')->nullable(); // Foreign Key
            $table->timestamps();


            $table->foreign('product_category_id')
                  ->references('id')
                  ->on('product_categories');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
        });

        Schema::dropIfExists('products');
    }
}
