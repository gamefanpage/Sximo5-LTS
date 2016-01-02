<?php

use Illuminate\Database\Seeder;

class TbRestapiTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_restapi')->delete();
        
	}

}
