<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_booking', function(Blueprint $table)
		{
			$table->string('id_payment', 50);
			$table->string('id_booking', 50)->index('fk_payment_booking2');
			$table->primary(['id_payment','id_booking']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_booking');
	}

}
