<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->string('id_payment', 35)->primary();
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
		Schema::drop('payments');
	}

}
