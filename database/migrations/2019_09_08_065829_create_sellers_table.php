<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('seller_id');
            $table->string('seller_name');
            $table->string('seller_phone');
            $table->string('seller_address');
            $table->string('shop_name');
            $table->string('seller_email')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('shop_phone')->nullable();
            $table->string('shop_email')->nullable();
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->unsignedInteger('shop_category')->nullable();
            $table->boolean('seller_status')->default(config('app.inactive'));
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('sellers');
    }
}
