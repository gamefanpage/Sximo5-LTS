<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbBlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_blogs', function(Blueprint $table)
		{
			$table->integer('blogID', true);
			$table->integer('CatID')->nullable();
			$table->string('title')->nullable();
			$table->string('slug')->nullable();
			$table->text('content', 65535)->nullable();
			$table->dateTime('created')->nullable();
			$table->string('tags')->nullable();
			$table->enum('status', array('publish','unpublish','draft'))->nullable()->default('draft');
			$table->string('image', 100)->nullable();
			$table->integer('entryby')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_blogs');
	}

}
