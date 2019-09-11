<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('campaign_slug');
            $table->unsignedTinyInteger('seller_pro_limit')->default(10);
            $table->longText('campaign_rules')->nullable();
            $table->unsignedTinyInteger('total_product')->default(50);
            $table->unsignedBigInteger('adds_attachment_id')->nullable();
            $table->boolean('adds_position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn([
                'campaign_slug',
                'seller_pro_limit',
                'campaign_rules',
                'total_product',
                'adds_attachment_id',
                'adds_position',
            ]);
        });
    }
}
