<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table)
		{
			$table->string('id_schedule', 50)->primary();
			$table->string('id_field', 50)->index('fk_field_schedule');
			$table->string('id_booking', 50)->nullable()->index('fk_schedule_booking');
			$table->date('date')->nullable();
			$table->string('day', 15)->nullable();
			$table->time('start_time')->nullable();
			$table->time('end_time')->nullable();
			$table->bigInteger('price')->nullable();
			$table->integer('down_payment')->nullable();
			$table->boolean('booking_status')->nullable();
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
		Schema::drop('schedules');
	}

}
