<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_schedules', function (Blueprint $table) {
            $table->string('id_location_schedule', 50)->primary();
			$table->string('id_location', 50)->index('fk_location_location_schedule');
			$table->string('everyday', 20)->nullable();
            $table->string('monday', 20)->nullable();
            $table->string('tuesday', 20)->nullable();
            $table->string('wednesday', 20)->nullable();
            $table->string('thursday', 20)->nullable();
            $table->string('friday', 20)->nullable();
            $table->string('saturday', 20)->nullable();
			$table->string('sunday', 20)->nullable();
			$table->string('created_by')->nullable();
			$table->timestamps();
			$table->string('updated_by')->nullable();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_schedules');
    }
}
