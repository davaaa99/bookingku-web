<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->string('id_booking', 35)->primary();
			$table->string('id_schedule', 35)->nullable()->index('fk_schedule_booking2');
			$table->string('client_email')->nullable();
			$table->string('user_email')->nullable();
			$table->string('payment_type', 15)->nullable();
			$table->smallInteger('report_status')->nullable();
			$table->dateTime('created_at')->nullable();
			$table->string('created_by')->nullable();
			$table->dateTime('update_at')->nullable();
			$table->string('update_by')->nullable();
			$table->boolean('isdeleted')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bookings');
	}

}
