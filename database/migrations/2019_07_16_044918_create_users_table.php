<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->string('id_users', 50)->primary();
			$table->string('email')->nullable();
			$table->string('password')->nullable();
			$table->string('name', 50)->nullable();
			$table->string('account_number', 25)->nullable();
			$table->string('phone_number', 20)->nullable();
			$table->string('users_type', 15)->nullable();
			$table->string('users_photo')->nullable();
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
		Schema::drop('users');
	}

}
