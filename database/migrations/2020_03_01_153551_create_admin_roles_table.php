<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->bigIncrements('admin_role_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedSmallInteger('role_id')->default(3);
            $table->boolean('orders')->default(1)->nullable();
            $table->boolean('order_update')->default(1)->nullable();
            $table->boolean('product')->default(1)->nullable();
            $table->boolean('manage_product')->default(1)->nullable();
            $table->boolean('add_product')->default(1)->nullable();
            $table->boolean('publish_product')->default(1)->nullable();
            $table->boolean('customer')->default(0)->nullable();
            $table->boolean('manage_customer')->default(0)->nullable();
            $table->boolean('shops')->default(0)->nullable();
            $table->boolean('manage_shop')->default(0)->nullable();
            $table->boolean('category')->default(0)->nullable();
            $table->boolean('manage_category')->default(0)->nullable();
            $table->boolean('brand')->default(0)->nullable();
            $table->boolean('manage_brand')->default(0)->nullable();
            $table->boolean('color')->default(0)->nullable();
            $table->boolean('manage_color')->default(0)->nullable();
            $table->boolean('tag')->default(0)->nullable();
            $table->boolean('manage_tag')->default(0)->nullable();
            $table->boolean('size')->default(0)->nullable();
            $table->boolean('manage_size')->default(0)->nullable();
            $table->boolean('skin_type')->default(0)->nullable();
            $table->boolean('manage_skin_type')->default(0)->nullable();
            $table->boolean('delivery_method')->default(0)->nullable();
            $table->boolean('manage_delivery_method')->default(0)->nullable();
            $table->boolean('cms')->default(0)->nullable();
            $table->boolean('product_group')->default(0)->nullable();
            $table->boolean('manage_product_group')->default(0)->nullable();
            $table->boolean('latest_deal')->default(0)->nullable();
            $table->boolean('manage_latest_deal')->default(0)->nullable();
            $table->boolean('slider')->default(0)->nullable();
            $table->boolean('manage_slider')->default(0)->nullable();
            $table->boolean('general_page')->default(0)->nullable();
            $table->boolean('manage_general_page')->default(0)->nullable();
            $table->boolean('setting')->default(0)->nullable();
            $table->boolean('manage_setting')->default(0)->nullable();
            $table->boolean('newsletter')->default(0)->nullable();
            $table->boolean('manage_newsletter')->default(0)->nullable();
            $table->boolean('account_setting')->default(0)->nullable();
            $table->boolean('admin_account')->default(0)->nullable();
            $table->boolean('manage_admin_account')->default(0)->nullable();
            $table->boolean('coupon_create')->default(0)->nullable();
            $table->boolean('coupon_manage')->default(0)->nullable();
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
        Schema::dropIfExists('admin_roles');
    }
}
