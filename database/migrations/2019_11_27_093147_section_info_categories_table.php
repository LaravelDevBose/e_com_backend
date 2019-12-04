<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SectionInfoCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('attachment_id', 'banner_id');
            $table->unsignedBigInteger('sect_banner_id')->nullable();
            $table->unsignedBigInteger('icon_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->renameColumn('banner_id','attachment_id');
            $table->dropColumn(['sect_banner_id', 'icon_id'])->nullable();
        });
    }
}
