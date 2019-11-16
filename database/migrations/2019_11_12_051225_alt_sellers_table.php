<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropColumn(['shop_name','shop_address','shop_phone', 'shop_email','shop_status' ]);
            $table->string('seller_name');
            $table->string('seller_email')->nullable();
            $table->string('seller_phone')->nullable();
            $table->string('seller_address')->nullable();
            $table->boolean('seller_type')->nullable();
            $table->boolean('seller_status')->default(config('app.inactive'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropColumn(['seller_name','seller_email','seller_phone', 'seller_address','seller_status','seller_type']);
            $table->string('shop_name');
            $table->string('shop_address')->nullable();
            $table->string('shop_phone')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('shop_status')->default(config('app.inactive'));
        });
    }
}
