<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedules', function(Blueprint $table)
		{
			$table->foreign('id_field', 'fk_field_schedule')->references('id_field')->on('fields')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_booking', 'fk_schedule_booking')->references('id_booking')->on('bookings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedules', function(Blueprint $table)
		{
			$table->dropForeign('fk_field_schedule');
			$table->dropForeign('fk_schedule_booking');
		});
	}

}
