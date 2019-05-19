<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryAreaDeliveryCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_costs', function (Blueprint $table){
            $table->boolean('delivery_area')->default(1);
            $table->decimal('package_weight')->change();
            $table->decimal('package_length')->change();
            $table->decimal('package_width')->change();
            $table->decimal('package_height')->change();
            $table->decimal('cost_price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_costs', function (Blueprint $table){
            $table->dropIfExists(['delivery_area']);
            $table->float('package_weight', 10,4)->change();
            $table->float('package_length', 10,4)->change();
            $table->float('package_width', 10,4)->change();
            $table->float('package_height', 10,4)->change();
            $table->float('cost_price', 10,4)->change();
        });
    }
}
