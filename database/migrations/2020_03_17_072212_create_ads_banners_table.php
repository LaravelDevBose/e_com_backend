<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_banners', function (Blueprint $table) {
            $table->bigIncrements('ads_banner_id');
            $table->string('ads_title')->nullable();
            $table->string('ads_trans_title')->nullable();
            $table->unsignedBigInteger('attachment_id');
            $table->string('ads_url')->nullable();
            $table->boolean('ads_position');
            $table->dateTime('ads_expired')->nullable();
            $table->boolean('ads_status')->default(config('app.active'));
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
        Schema::dropIfExists('ads_banners');
    }
}
