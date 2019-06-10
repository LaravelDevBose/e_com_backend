<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->bigIncrements('details_id');
            $table->unsignedBigInteger('product_id');
            $table->string('main_materials')->nullable();
            $table->string('product_model')->nullable();
            $table->unsignedTinyInteger('num_of_pieces')->nullable();
            $table->boolean('product_occasion')->nullable();
            $table->string('color_shade')->nullable();
            $table->string('skin_type')->nullable();
            $table->text('extra_details')->nullable();
            $table->unsignedInteger('gift_product_id')->nullable();
            $table->string('gift_product_sku')->nullable();
            $table->string('warranty_policy')->nullable();
            $table->string('warranty_policy_eng')->nullable();
            $table->string('warranty_period')->nullable();
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
        Schema::dropIfExists('product_details');
    }
}
