<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_booking', function(Blueprint $table)
		{
			$table->foreign('id_payment', 'fk_payment_booking')->references('id_payment')->on('payments')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_booking', 'fk_payment_booking2')->references('id_booking')->on('bookings')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_booking', function(Blueprint $table)
		{
			$table->dropForeign('fk_payment_booking');
			$table->dropForeign('fk_payment_booking2');
		});
	}

}
