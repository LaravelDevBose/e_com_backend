<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shop_id');
            $table->unsignedBigInteger('seller_id');
            $table->string('shop_name');
            $table->string('shop_slug');
            $table->unsignedBigInteger('logo_id')->nullable();
            $table->text('shop_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('shop_email')->nullable();
            $table->unsignedInteger('shop_category')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
