<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('forum_comments', function (Blueprint $table)
		{
			$table->integer ('CommentID', true);
			$table->text ('Comment', 65535)->nullable ();
			$table->integer ('UserID')->nullable ();
			$table->dateTime ('Posted')->nullable ();
			$table->integer ('PostID')->nullable ();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop ('forum_comments');
	}

}
