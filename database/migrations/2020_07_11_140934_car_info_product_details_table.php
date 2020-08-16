<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarInfoProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->string('car_engine')->nullable();
            $table->string('car_gear_box')->nullable();
            $table->string('car_mileage')->nullable();
            $table->string('car_year')->nullable();
            $table->string('car_color')->nullable();
            $table->string('car_body_type')->nullable();
            $table->string('car_fuel_type')->nullable();
            $table->string('car_ara_con')->nullable();
            $table->string('car_drive_type')->nullable();
            $table->string('car_condition')->nullable();
            $table->boolean('car_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_details', function (Blueprint $table) {
            $table->dropColumn([
                'car_engine',
                'car_gear_box',
                'car_mileage',
                'car_year',
                'car_color',
                'car_body_type',
                'car_fuel_type',
                'car_ara_con',
                'car_drive_type',
                'car_condition',
                'car_type',
            ]);
        });
    }
}
