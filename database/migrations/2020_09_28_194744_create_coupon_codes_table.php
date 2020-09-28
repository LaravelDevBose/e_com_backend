<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->bigIncrements('coupon_id');
            $table->string('coupon_title');
            $table->string('coupon_code')->unique();
            $table->float('coupon_amount');
            $table->float('min_order')->nullable();
            $table->unsignedInteger('coupon_qty')->nullable();
            $table->dateTime('expire_at')->default(\Carbon\Carbon::now()->addYears(25))->nullable();
            $table->unsignedBigInteger('attachment_id')->nullable();
            $table->boolean('coupon_status')->default(config('app.active'))->nullable();
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
        Schema::dropIfExists('coupon_codes');
    }
}
