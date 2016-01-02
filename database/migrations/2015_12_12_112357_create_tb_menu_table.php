<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_menu', function(Blueprint $table)
		{
			$table->integer('menu_id', true);
			$table->integer('parent_id')->nullable()->default(0);
			$table->string('module', 50)->nullable();
			$table->string('url', 100)->nullable();
			$table->string('menu_name', 100)->nullable();
			$table->char('menu_type', 10)->nullable();
			$table->string('role_id', 100)->nullable();
			$table->smallInteger('deep')->nullable();
			$table->integer('ordering')->nullable();
			$table->enum('position', array('top','sidebar','both'))->nullable();
			$table->string('menu_icons', 30)->nullable();
			$table->enum('active', array('0','1'))->nullable()->default('1');
			$table->text('access_data', 65535)->nullable();
			$table->enum('allow_guest', array('0','1'))->nullable()->default('0');
			$table->text('menu_lang', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_menu');
	}

}
