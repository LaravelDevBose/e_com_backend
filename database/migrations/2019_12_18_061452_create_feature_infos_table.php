<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeatureInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_infos', function (Blueprint $table) {
            $table->bigIncrements('feature_id');
            $table->string('feature_title');
            $table->string('lang_title')->nullable();
            $table->string('feature_slug')->nullable();
            $table->unsignedBigInteger('banner_id')->nullable();
            $table->boolean('feature_type')->default('1')->nullable();
            $table->boolean('feature_position')->default('1')->nullable();
            $table->dateTime('expired_at');
            $table->dateTime('publish_at')->default(\Carbon\Carbon::today()->addDays(2));
            $table->boolean('feature_status')->default(config('app.inactive'));
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
        Schema::dropIfExists('feature_infos');
    }
}
