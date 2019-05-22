<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltStatusCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns',function (Blueprint $table){
            $table->boolean('campaign_status')->default(config('app.inactive'));
            $table->timestamp('camp_reg_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns',function (Blueprint $table){
            $table->dropIfExists(['campaign_status','camp_reg_date']);
        });
    }
}
