<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIsdeletedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });
        
        Schema::table('locations', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });

        Schema::table('fields', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });

        Schema::table('bookings', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });

        Schema::table('payments', function(Blueprint $table){
            $table->dropColumn('isdeleted');
        });

        //............
        Schema::table('users', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });
        
        Schema::table('locations', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::table('fields', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::table('bookings', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });

        Schema::table('payments', function(Blueprint $table){
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });
        
        Schema::table('locations', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });

        Schema::table('fields', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });

        Schema::table('bookings', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });

        Schema::table('payments', function(Blueprint $table){
            $table->dropColumn('deleted_at');
        });

        //............
        Schema::table('users', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });
        
        Schema::table('locations', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });

        Schema::table('fields', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });

        Schema::table('bookings', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });

        Schema::table('payments', function(Blueprint $table){
            $table->boolean('isdeleted')->default(0);
        });
    }
}
