<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
            $table->longText('highlight')->change();
            $table->longText('description')->change();
            $table->longText('lang_highlight')->change();
            $table->longText('lang_description')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->string('highlight')->change();
            $table->string('description')->change();
            $table->string('lang_highlight')->change();
            $table->string('lang_description')->change();
        });
    }
}
