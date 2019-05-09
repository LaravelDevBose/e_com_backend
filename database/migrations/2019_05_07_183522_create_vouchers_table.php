<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('voucher_id');
            $table->string('voucher_name');
            $table->dateTime('voucher_start');
            $table->dateTime('voucher_end');
            $table->boolean('voucher_type')->default(1);
            $table->string('voucher_code');
            $table->unsignedTinyInteger('voucher_issued')->nullable();
            $table->boolean('discount_type')->default(1);
            $table->unsignedInteger('discount_value');
            $table->unsignedInteger('max_discount');
            $table->unsignedInteger('min_order_value');
            $table->unsignedInteger('usage_limit');
            $table->boolean('apply_to')->default(1);
            $table->unsignedBigInteger('attachment_id')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
