<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltGiftProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table){
            $table->dropColumn(['gift_product_id','gift_product_sku']);
        });

        Schema::table('product_variations', function (Blueprint $table){
            $table->unsignedInteger('gift_product_id')->nullable();
            $table->string('gift_product_sku')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('product_variations', function (Blueprint $table){
            $table->dropColumn(['gift_product_id','gift_product_sku']);
        });

        Schema::table('product_details', function (Blueprint $table){
            $table->unsignedInteger('gift_product_id')->nullable();
            $table->string('gift_product_sku')->nullable();
        });
    }
}
