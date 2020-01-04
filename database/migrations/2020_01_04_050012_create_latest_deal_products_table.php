<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatestDealProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latest_deal_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('latest_deal_id');
            $table->unsignedBigInteger('product_id');
            $table->boolean('status')->default(config('app.active'));
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
        Schema::dropIfExists('latest_deal_products');
    }
}
