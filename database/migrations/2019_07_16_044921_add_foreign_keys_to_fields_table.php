<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fields', function(Blueprint $table)
		{
			$table->foreign('id_location', 'fk_location_field')->references('id_location')->on('locations')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('id_kind_of_field', 'fk_relationship_6')->references('id_kind_of_field')->on('kind_of_fields')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fields', function(Blueprint $table)
		{
			$table->dropForeign('fk_location_field');
			$table->dropForeign('fk_relationship_6');
		});
	}

}
