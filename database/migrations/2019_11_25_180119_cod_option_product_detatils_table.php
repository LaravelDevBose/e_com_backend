<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CodOptionProductDetatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->boolean('cod_avail')->default(0)->nullable();
        });

        Schema::table('shops', function (Blueprint $table){
            $table->string('min_deli_day')->nullable();
            $table->string('max_deli_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->dropColumn('cod_avail');
        });
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn(['min_deli_day','max_deli_day']);
        });
    }
}
