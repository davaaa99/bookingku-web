<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
			$table->string('id_location', 35)->primary();
			$table->string('id_users', 50)->nullable()->index('fk_users_location');
			$table->string('location_name', 50)->nullable();
			$table->string('location_address')->nullable();
			$table->text('description', 65535)->nullable();
			$table->time('open_time')->nullable();
			$table->time('closing_time')->nullable();
			$table->string('location_photo')->nullable();
			$table->string('city', 30)->nullable();
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
		Schema::drop('locations');
	}

}
