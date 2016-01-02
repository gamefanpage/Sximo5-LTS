<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_module', function(Blueprint $table)
		{
			$table->integer('module_id', true);
			$table->string('module_name', 100)->nullable();
			$table->string('module_title', 100)->nullable();
			$table->string('module_note')->nullable();
			$table->string('module_author', 100)->nullable();
			$table->dateTime('module_created')->nullable();
			$table->text('module_desc', 65535)->nullable();
			$table->string('module_db')->nullable();
			$table->string('module_db_key', 100)->nullable();
			$table->enum('module_type', array('master','report','proccess','core','generic','addon','ajax'))->nullable()->default('master');
			$table->text('module_config')->nullable();
			$table->text('module_lang', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_module');
	}

}
