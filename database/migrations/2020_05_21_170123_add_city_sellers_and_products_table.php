<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCitySellersAndProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sellers', function (Blueprint $table){
            $table->boolean('seller_city')->default(\App\Models\AddressBook::cityList['all']);
        });
        Schema::table('products', function (Blueprint $table){
            $table->boolean('product_city')->default(\App\Models\AddressBook::cityList['all']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellers', function (Blueprint $table){
            $table->dropColumn('seller_city');
        });
        Schema::table('products', function (Blueprint $table){
            $table->dropColumn('product_city');
        });
    }
}
