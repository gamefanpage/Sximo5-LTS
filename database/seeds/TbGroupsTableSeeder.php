<?php

use Illuminate\Database\Seeder;

class TbGroupsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_groups')->delete();
        
		\DB::table('tb_groups')->insert(array (
			0 => 
			array (
				'group_id' => 1,
				'name' => 'Superadmin',
				'description' => 'Root Superadmin , should be as top level groups',
				'level' => 1,
			),
			1 => 
			array (
				'group_id' => 2,
				'name' => 'Administrator',
				'description' => 'Administrator level, level No 23',
				'level' => 2,
			),
			2 => 
			array (
				'group_id' => 3,
				'name' => 'Users',
				'description' => '<p>Users as registered / member</p>',
				'level' => 3,
			),
		));
	}

}
