<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SkinTypeProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table){
            $table->renameColumn('skin_type', 'skin_type_id');
        });
        Schema::table('product_details', function (Blueprint $table){
            $table->unsignedBigInteger('skin_type_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_details', function (Blueprint $table){
            $table->renameColumn('skin_type_id', 'skin_type');
        });
        Schema::table('product_details', function (Blueprint $table){
            $table->string('skin_type')->change();
        });
    }
}
