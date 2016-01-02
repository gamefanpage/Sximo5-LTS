<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSbClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sb_clients', function(Blueprint $table)
		{
			$table->integer('ClientID', true);
			$table->string('Company', 100)->nullable();
			$table->text('About', 65535)->nullable();
			$table->string('Contact', 100)->nullable();
			$table->string('Logo', 100)->nullable();
			$table->integer('UserID')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sb_clients');
	}

}
