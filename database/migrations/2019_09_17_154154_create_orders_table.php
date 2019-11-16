<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('order_no')->nullable();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedInteger('total_qty');
            $table->decimal('sub_total', 8,4);
            $table->decimal('discount',8,4)->nullable();
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->decimal('voucher_price', 8,4)->nullable();
            $table->decimal('total', 8,4);
            $table->date('order_date')->useCurrent();
            $table->boolean('order_status')->default(config('app.active'));
            $table->boolean('shipping_method')->default(config('app.active'));
            $table->dateTime('delivery_date')->useCurrent();
            $table->boolean('delivery_media')->default(config('app.active'));
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
        Schema::dropIfExists('orders');
    }
}
