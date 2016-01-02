<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbGroupsAccessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_groups_access', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('group_id')->nullable();
			$table->integer('module_id')->nullable();
			$table->text('access_data', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_groups_access');
	}

}
