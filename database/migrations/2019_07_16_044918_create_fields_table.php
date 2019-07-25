<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fields', function(Blueprint $table)
		{
			$table->string('id_field', 35)->primary();
			$table->string('id_kind_of_field', 35)->nullable()->index('fk_relationship_6');
			$table->string('id_location', 35)->nullable()->index('fk_location_field');
			$table->string('field_type', 20)->nullable();
			$table->string('field_name', 30)->nullable();
			$table->string('field_photo')->nullable();
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
		Schema::drop('fields');
	}

}
