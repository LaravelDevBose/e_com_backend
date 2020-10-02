<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_products', function (Blueprint $table) {
            $table->bigIncrements('dis_pro_id');
            $table->unsignedBigInteger('product_id');
            $table->float('discount_percent');
            $table->dateTime('start_at')->useCurrent();
            $table->dateTime('expire_at');
            $table->boolean('status')->default(config('app.active'))->nullable();
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
        Schema::dropIfExists('discount_products');
    }
}
