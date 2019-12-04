<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocalizationColoum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table){
           $table->string('trans_category_name')->nullable();
        });

        Schema::table('brands', function (Blueprint $table){
            $table->string('trans_brand_name')->nullable();
        });

        Schema::table('sliders', function (Blueprint $table){
           $table->string('trans_slider_title')->nullable();
           $table->string('trans_sub_title')->nullable();
           $table->string('trans_btn_text')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table){
            $table->dropColumn('trans_category_name');
        });

        Schema::table('brands', function (Blueprint $table){
            $table->dropColumn('trans_brand_name');
        });

        Schema::table('sliders', function (Blueprint $table){
            $table->dropColumn('trans_slider_title');
            $table->dropColumn('trans_sub_title');
            $table->dropColumn('trans_btn_text');
        });
    }
}
