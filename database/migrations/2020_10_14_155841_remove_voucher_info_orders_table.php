<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveVoucherInfoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['voucher_id', 'voucher_price', 'shipping_method']);
            $table->unsignedBigInteger('delivery_method_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->decimal('voucher_price')->nullable();
            $table->boolean('shipping_method')->default(config('app.active'));
            $table->dropColumn('delivery_method_id');
        });
    }
}
