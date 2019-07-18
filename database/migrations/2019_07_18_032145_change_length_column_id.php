<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLengthColumnId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function(Blueprint $table){
            $table->string('id_location',50)->change();
        });

        Schema::table('fields', function(Blueprint $table){
            $table->string('id_field',50)->change();
            $table->string('id_location',50)->change();
            $table->string('id_kind_of_field',50)->change();
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->string('id_kind_of_field',50)->change();
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->string('id_schedule',50)->change();
            $table->string('id_field',50)->change();
            $table->string('id_booking',50)->change();
        });

        Schema::table('bookings', function(Blueprint $table){
            $table->string('id_booking',50)->change();
            $table->string('id_schedule',50)->change();
        });

        Schema::table('payments', function(Blueprint $table){
            $table->string('id_payment',50)->change();
        });

        Schema::table('payment_booking', function(Blueprint $table){
            $table->string('id_payment',50)->change();
            $table->string('id_booking',50)->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('locations', function(Blueprint $table){
        //     $table->string('id_location',35)->change();
        // });

        // Schema::table('fields', function(Blueprint $table){
        //     $table->string('id_field',35)->change();
        //     $table->string('id_location',35)->change();
        //     $table->string('id_kind_of_field',35)->change();
        // });

        // Schema::table('kind_of_fields', function(Blueprint $table){
        //     $table->string('id_kind_of_field',35)->change();
        // });

        // Schema::table('schedules', function(Blueprint $table){
        //     $table->string('id_schedule',35)->change();
        //     $table->string('id_field',35)->change();
        //     $table->string('id_booking',35)->change();
        // });

        // Schema::table('bookings', function(Blueprint $table){
        //     $table->string('id_booking',35)->change();
        //     $table->string('id_schedule',35)->change();
        // });

        // Schema::table('payments', function(Blueprint $table){
        //     $table->string('id_payment',35)->change();
        // });

        // Schema::table('payment_booking', function(Blueprint $table){
        //     $table->string('id_payment',35)->change();
        //     $table->string('id_booking',35)->change();
        // });
    }
}
