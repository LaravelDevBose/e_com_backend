<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->string('size')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->string('color')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('brand')->nullable();
            $table->unsignedInteger('qty');
            $table->decimal('price');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('total_price');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->boolean('item_status')->default(config('app.active'));
            $table->boolean('cancel_by')->nullable();
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
        Schema::dropIfExists('order_items');
    }
}
