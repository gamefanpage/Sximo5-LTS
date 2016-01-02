<?php

use Illuminate\Database\Seeder;

class SbTicketsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('sb_tickets')->delete();
        
	}

}
