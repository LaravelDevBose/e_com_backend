<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistrictRegionInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('address_books', function (Blueprint $table){
            $table->string('district')->nullable();
            $table->string('region')->nullable();
        });
        Schema::table('shipping_infos', function (Blueprint $table){
            $table->string('district')->nullable();
            $table->string('region')->nullable();
        });
        Schema::table('billing_infos', function (Blueprint $table){
            $table->string('district')->nullable();
            $table->string('region')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address_books', function (Blueprint $table){
            $table->dropColumn(['district', 'region']);
        });
        Schema::table('shipping_infos', function (Blueprint $table){
            $table->dropColumn(['district', 'region']);
        });
        Schema::table('billing_infos', function (Blueprint $table){
            $table->dropColumn(['district', 'region']);
        });
    }
}
