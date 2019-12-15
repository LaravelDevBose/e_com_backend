<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TotalSubTotalUpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('sub_total', 12,2)->change();
            $table->decimal('discount')->default(0)->change();
            $table->decimal('voucher_price')->default(0)->change();
            $table->decimal('total', 12,2)->change();
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
            $table->decimal('sub_total', 8,4)->change();
            $table->decimal('discount',8,4)->nullable()->change();
            $table->unsignedBigInteger('voucher_id')->nullable()->change();
            $table->decimal('voucher_price', 8,4)->nullable()->change();
            $table->decimal('total', 8,4)->change();
        });
    }
}
