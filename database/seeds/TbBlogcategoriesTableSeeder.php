<?php

use Illuminate\Database\Seeder;

class TbBlogcategoriesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_blogcategories')->delete();
        
		\DB::table('tb_blogcategories')->insert(array (
			0 => 
			array (
				'CatID' => 1,
				'name' => 'Tutorial theas',
				'alias' => 'tutorial-theas',
				'enable' => '1',
			),
			1 => 
			array (
				'CatID' => 2,
				'name' => 'News',
				'alias' => 'news',
				'enable' => '1',
			),
			2 => 
			array (
				'CatID' => 3,
				'name' => 'API',
				'alias' => 'api',
				'enable' => '1',
			),
			3 => 
			array (
				'CatID' => 4,
				'name' => 'Lifestyle',
				'alias' => 'Lifestyle',
				'enable' => '1',
			),
			4 => 
			array (
				'CatID' => 5,
				'name' => 'Food',
				'alias' => 'food',
				'enable' => '1',
			),
			5 => 
			array (
				'CatID' => 8,
				'name' => 'new categories',
				'alias' => 'new-categories',
				'enable' => '1',
			),
		));
	}

}
