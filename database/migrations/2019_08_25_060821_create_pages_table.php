<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\models\Page;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('page_id');
            $table->string('page_title');
            $table->string('menu_title');
            $table->string('page_slug');
            $table->boolean('show_in')->default(Page::MENU_SHOW_IN['Header'])->nullable();
            $table->boolean('menu_position')->default(1)->nullable();
            $table->longText('body_content')->nullable();
            $table->longText('other_content')->nullable();
            $table->unsignedBigInteger('attachment_id')->nullable();
            $table->boolean('page_status')->default(config('app.active'));
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
        Schema::dropIfExists('pages');
    }
}
