<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->bigIncrements('variation_id');
            $table->unsignedBigInteger('product_id');
            $table->string('seller_sku');
            $table->string('pri_id')->nullable();
            $table->string('pri_model')->nullable();
            $table->string('sec_id')->nullable();
            $table->string('sec_model')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
}
