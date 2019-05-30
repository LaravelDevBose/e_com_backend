<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id')->nullable();
            $table->string('product_name');
            $table->string('highlight')->nullable();
            $table->string('description')->nullable();
            $table->string('lang_product_name')->nullable();
            $table->string('lang_highlight')->nullable();
            $table->string('lang_description')->nullable();
            $table->boolean('dangers_goods')->nullable();
            $table->string('what_in_box')->nullable();
            $table->decimal('package_weight')->nullable();
            $table->decimal('package_length')->nullable();
            $table->decimal('package_width')->nullable();
            $table->decimal('package_height')->nullable();
            $table->decimal('delivery_cost1')->nullable();
            $table->decimal('delivery_cost2')->nullable();
            $table->decimal('product_status')->default(config('app.product_create'));
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
        Schema::dropIfExists('products');
    }
}
