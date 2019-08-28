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
			$table->string('id_booking', 50)->primary();
			$table->string('id_schedule', 50)->index('fk_schedule_booking2');
			$table->string('client_email')->nullable();
			$table->string('user_email')->nullable();
			$table->string('payment_type', 15)->nullable();
			$table->smallInteger('payment_status')->nullable();
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
		Schema::drop('bookings');
	}

}
