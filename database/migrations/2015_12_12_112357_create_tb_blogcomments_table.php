<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbBlogcommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_blogcomments', function(Blueprint $table)
		{
			$table->integer('commentID', true);
			$table->integer('parentID')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('blogID')->nullable();
			$table->string('name', 100)->nullable();
			$table->string('email', 100)->nullable();
			$table->text('comment', 65535)->nullable();
			$table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_blogcomments');
	}

}
