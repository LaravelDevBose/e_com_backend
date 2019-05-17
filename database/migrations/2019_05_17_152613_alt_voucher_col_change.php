<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltVoucherColChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers',function (Blueprint $table){
            $table->boolean('voucher_status')->default(config('app.active'));
            $table->decimal('discount_value')->change();
            $table->decimal('max_discount')->change();
            $table->decimal('min_order_value')->change();
            $table->unsignedInteger('max_discount')->default('0.00')->change();
            $table->dateTime('collect_start')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers',function (Blueprint $table){
            $table->unsignedInteger('discount_value')->change();
            $table->unsignedInteger('max_discount')->change();
            $table->unsignedInteger('min_order_value')->change();
            $table->dropColumn(['collect_start', 'voucher_status']);
        });
    }
}
