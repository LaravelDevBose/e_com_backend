<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePhoneNoUniqueUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone_no');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('users', 'phone_no')){
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('phone_no');
            });
        }else{
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone_no')->nullable();
            });
        }
    }
}
