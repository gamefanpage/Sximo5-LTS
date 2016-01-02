<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSbProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sb_projects', function(Blueprint $table)
		{
			$table->integer('ProjectID', true);
			$table->string('ProjectName')->nullable();
			$table->text('Description', 65535)->nullable();
			$table->integer('ClientID')->nullable();
			$table->enum('Status', array('inactive','active','suspended','canceled'))->nullable()->default('active');
			$table->boolean('Progress')->nullable();
			$table->string('Teams', 100)->nullable();
			$table->date('Created')->nullable();
			$table->date('LastUpdate')->nullable();
			$table->date('DueDate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sb_projects');
	}

}
