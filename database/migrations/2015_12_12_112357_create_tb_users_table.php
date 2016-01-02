<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('group_id')->nullable();
			$table->string('username', 100);
			$table->string('password', 64);
			$table->string('email', 100);
			$table->string('first_name', 50)->nullable();
			$table->string('last_name', 50)->nullable();
			$table->string('avatar', 100)->nullable();
			$table->boolean('active')->nullable();
			$table->boolean('login_attempt')->nullable()->default(0);
			$table->dateTime('last_login')->nullable();
			$table->timestamps();
			$table->string('reminder', 64)->nullable();
			$table->string('activation', 50)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->integer('last_activity');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_users');
	}

}
