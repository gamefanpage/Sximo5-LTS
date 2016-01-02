<?php

use Illuminate\Database\Seeder;

class SbTicketcommentsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('sb_ticketcomments')->delete();
        
	}

}
