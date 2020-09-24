<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('slider_id');
            $table->string('slider_title');
            $table->string('sub_title')->nullable();
            $table->string('btn_text')->default('see more')->nullable();
            $table->text('btn_url')->nullable();
            $table->unsignedTinyInteger('slider_position')->default(0);
            $table->unsignedBigInteger('attachment_id');
            $table->boolean('slider_status')->default(config('app.active'));
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
