<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('forum_categories', function (Blueprint $table)
		{
			$table->integer ('CategoryID', true);
			$table->string ('Name', 100)->nullable ();
			$table->integer ('ForumID')->nullable ();
			$table->string ('Note', 100)->nullable ();
			$table->integer ('Ordering');
			$table->enum ('Allow', array('0', '1'))->default ('0');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop ('forum_categories');
	}

}
