<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('forum_posts', function (Blueprint $table)
		{
			$table->integer ('PostID', true);
			$table->string ('Title')->nullable ();
			$table->string ('Alias')->nullable ();
			$table->text ('Content', 65535)->nullable ();
			$table->integer ('CategoryID')->nullable ();
			$table->dateTime ('Posted')->nullable ();
			$table->integer ('Hint')->default (0);
			$table->integer ('UserID')->nullable ();
			$table->enum ('Sticky', array('0', '1'))->nullable ()->default ('0');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop ('forum_posts');
	}

}
