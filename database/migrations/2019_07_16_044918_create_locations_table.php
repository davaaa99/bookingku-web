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
			$table->string('id_location', 50)->primary();
			$table->string('id_user', 50)->nullable()->index('fk_users_location');
			$table->string('location_name', 50)->nullable();
			$table->string('location_address')->nullable();
			$table->text('description', 65535)->nullable();
			$table->time('open_time')->nullable();
			$table->time('closing_time')->nullable();
			$table->string('location_photo')->nullable();
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
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
		Schema::drop('locations');
	}

}
