<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductTypeInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function (Blueprint $table){
            $table->boolean('product_type')->default(\App\Models\Product::ProductType['Simple']);
            $table->unsignedInteger('product_qty')->nullable();
            $table->unsignedInteger('product_price')->nullable();
            $table->string('seller_sku')->nullable();
        });

        Schema::table('product_images', function (Blueprint $table){
            $table->unsignedBigInteger('pri_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function (Blueprint $table){
            $table->dropColumn(['product_type','product_qty','product_price','seller_sku']);
        });

        Schema::table('product_images', function (Blueprint $table){
            $table->unsignedBigInteger('pri_id')->change();
        });
    }
}
