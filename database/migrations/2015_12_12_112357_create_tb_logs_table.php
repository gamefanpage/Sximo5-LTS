<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTbLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_logs', function(Blueprint $table)
		{
			$table->integer('auditID', true);
			$table->string('ipaddress', 50)->nullable();
			$table->integer('user_id')->nullable();
			$table->string('module', 50)->nullable();
			$table->string('task', 50)->nullable();
			$table->text('note', 65535)->nullable();
			$table->timestamp('logdate')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_logs');
	}

}
