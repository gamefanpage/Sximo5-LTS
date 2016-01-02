<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSbTicketcommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sb_ticketcomments', function(Blueprint $table)
		{
			$table->integer('CommentID', true);
			$table->integer('TicketID')->nullable();
			$table->text('Comments', 65535)->nullable();
			$table->dateTime('Posted')->nullable();
			$table->integer('UserID')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sb_ticketcomments');
	}

}
