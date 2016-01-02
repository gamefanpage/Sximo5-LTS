<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbBlogcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_blogcategories', function(Blueprint $table)
		{
			$table->integer('CatID', true);
			$table->string('name', 100)->nullable();
			$table->string('alias', 100)->nullable();
			$table->enum('enable', array('0','1'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_blogcategories');
	}

}
