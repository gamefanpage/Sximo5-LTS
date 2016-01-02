<?php

use Illuminate\Database\Seeder;

class TbBlogcommentsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_blogcomments')->delete();
        
		\DB::table('tb_blogcomments')->insert(array (
			0 => 
			array (
				'commentID' => 16,
				'parentID' => NULL,
				'user_id' => 1,
				'blogID' => 1,
				'name' => NULL,
				'email' => NULL,
				'comment' => ' Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat',
				'created' => '2015-07-19 00:51:20',
			),
			1 => 
			array (
				'commentID' => 18,
				'parentID' => NULL,
				'user_id' => 4,
				'blogID' => 5,
				'name' => NULL,
				'email' => NULL,
				'comment' => 'My Name is khan',
				'created' => '2015-07-19 01:53:23',
			),
			2 => 
			array (
				'commentID' => 19,
				'parentID' => NULL,
				'user_id' => 4,
				'blogID' => 1,
				'name' => NULL,
				'email' => NULL,
				'comment' => 'Vestibulum ullamcorper sodales nisi nec condimentum. Mauris ',
				'created' => '2015-07-19 02:00:01',
			),
			3 => 
			array (
				'commentID' => 20,
				'parentID' => NULL,
				'user_id' => 1,
				'blogID' => 3,
				'name' => NULL,
				'email' => NULL,
				'comment' => 'test',
				'created' => '2015-12-11 21:35:01',
			),
		));
	}

}
