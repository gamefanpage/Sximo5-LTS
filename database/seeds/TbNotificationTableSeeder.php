<?php

use Illuminate\Database\Seeder;

class TbNotificationTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_notification')->delete();
        
	}

}
