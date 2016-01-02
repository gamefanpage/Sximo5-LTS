<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSbTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sb_tickets', function(Blueprint $table)
		{
			$table->integer('TicketID', true);
			$table->string('Subject')->nullable();
			$table->text('Description', 65535)->nullable();
			$table->char('Priority', 20)->nullable();
			$table->dateTime('Created')->nullable();
			$table->char('Status', 20)->nullable();
			$table->integer('entry_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sb_tickets');
	}

}
