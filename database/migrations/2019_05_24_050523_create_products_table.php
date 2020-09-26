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
            $table->unsignedBigInteger('seller_id')->default(0);
            $table->string('product_name');
            $table->string('product_sku');
            $table->string('product_slug')->nullable();
            $table->unsignedBigInteger('thumb_id');
            $table->longText('highlight')->nullable();
            $table->longText('description')->nullable();
            $table->text('video_url')->nullable();
            $table->boolean('product_type')->default(\App\Models\Product::ProductType['Simple']);
            $table->boolean('product_status')->default(config('app.product_create'));
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
