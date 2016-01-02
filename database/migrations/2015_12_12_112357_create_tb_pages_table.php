<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_pages', function(Blueprint $table)
		{
			$table->integer('pageID', true);
			$table->string('title')->nullable();
			$table->string('alias', 100)->nullable();
			$table->text('note', 65535)->nullable();
			$table->dateTime('created')->nullable();
			$table->dateTime('updated')->nullable();
			$table->string('filename', 50)->nullable();
			$table->enum('status', array('enable','disable'))->nullable()->default('enable');
			$table->text('access', 65535)->nullable();
			$table->enum('allow_guest', array('0','1'))->nullable()->default('0');
			$table->enum('template', array('frontend','backend'))->nullable()->default('frontend');
			$table->string('metakey')->nullable();
			$table->text('metadesc', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_pages');
	}

}
