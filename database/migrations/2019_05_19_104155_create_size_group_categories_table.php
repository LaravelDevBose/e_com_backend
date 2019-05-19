<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeGroupCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_group_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('size_group_id');
            $table->unsignedBigInteger('category_id');
            $table->boolean('sgc_status')->default(config('app.active'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_group_categories');
    }
}
