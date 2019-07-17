<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnUpdateAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function(Blueprint $table){
            $table->renameColumn('update_at','updated_at');
        });

        Schema::table('fields', function(Blueprint $table){
            $table->renameColumn('update_at','updated_at');
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->renameColumn('update_at','updated_at');
        });

        Schema::table('locations', function(Blueprint $table){
            $table->renameColumn('update_at','updated_at');
        });

        Schema::table('payments', function(Blueprint $table){
            $table->renameColumn('update_at','updated_at');
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->renameColumn('update_at','updated_at');
        });

        // Schema::table('users', function(Blueprint $table){
        //     $table->renameColumn('update_at','updated_at');
        // });

        Schema::table('bookings', function(Blueprint $table){
            $table->renameColumn('update_by','updated_by');
        });

        Schema::table('fields', function(Blueprint $table){
            $table->renameColumn('update_by','updated_by');
        });

        Schema::table('kind_of_fields', function(Blueprint $table){
            $table->renameColumn('update_by','updated_by');
        });

        Schema::table('locations', function(Blueprint $table){
            $table->renameColumn('update_by','updated_by');
        });

        Schema::table('payments', function(Blueprint $table){
            $table->renameColumn('update_by','updated_by');
        });

        Schema::table('schedules', function(Blueprint $table){
            $table->renameColumn('update_by','updated_by');
        });

        // Schema::table('users', function(Blueprint $table){
        //     $table->renameColumn('update_by','updated_by');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
