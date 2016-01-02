<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbRestapiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_restapi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('apiuser')->nullable();
			$table->string('apikey', 100)->nullable();
			$table->date('created')->nullable();
			$table->text('modules', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_restapi');
	}

}
