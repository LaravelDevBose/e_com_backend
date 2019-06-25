<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->dropColumn('variation_id');
            $table->unsignedBigInteger('pri_id');
            $table->boolean('model')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_images', function (Blueprint $table){
            $table->unsignedBigInteger('variation_id');
            $table->dropColumn(['pri_id', 'model']);
        });
    }
}
