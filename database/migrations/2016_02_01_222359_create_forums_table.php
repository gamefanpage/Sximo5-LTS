<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('forums', function (Blueprint $table)
		{
			$table->integer ('ForumID', true);
			$table->string ('Name', 100)->nullable ();
			$table->string ('Note')->nullable ();
			$table->char ('Icon', 30)->nullable ();
			$table->char ('Color', 10)->nullable ();
			$table->enum ('Active', array('1', '0'))->nullable ();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop ('forums');
	}

}
