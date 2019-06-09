<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltWarrantyInfoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
            $table->boolean('warranty_type')->nullable();
            $table->text('video_url')->nullable();
        });

        Schema::table('product_details', function (Blueprint $table){
            $table->string('warranty_policy')->nullable();
            $table->string('warranty_policy_eng')->nullable();
            $table->string('warranty_period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropIfExists(['warranty_type','video_url']);
        });

        Schema::table('product_details', function (Blueprint $table){
            $table->dropIfExists(['warranty_policy','warranty_policy_eng','warranty_period']);
        });
    }
}
