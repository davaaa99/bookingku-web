<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
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
        Schema::dropIfExists('users');
    }
}
