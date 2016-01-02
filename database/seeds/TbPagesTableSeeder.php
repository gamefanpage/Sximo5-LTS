<?php

use Illuminate\Database\Seeder;

class TbPagesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_pages')->delete();
        
		\DB::table('tb_pages')->insert(array (
			0 => 
			array (
				'pageID' => 1,
				'title' => 'Homepage',
				'alias' => 'home',
				'note' => NULL,
				'created' => '2014-02-14 00:00:00',
				'updated' => '2014-02-14 00:00:00',
				'filename' => 'home',
				'status' => 'enable',
				'access' => '{"1":"1","2":"1","3":"1"}',
				'allow_guest' => '1',
				'template' => 'frontend',
				'metakey' => 'tet',
				'metadesc' => 'tetet',
			),
			1 => 
			array (
				'pageID' => 29,
				'title' => 'service',
				'alias' => 'service',
				'note' => NULL,
				'created' => '0000-00-00 00:00:00',
				'updated' => '0000-00-00 00:00:00',
				'filename' => 'service',
				'status' => 'enable',
				'access' => '{"1":"1","2":"0","3":"0"}',
				'allow_guest' => '1',
				'template' => 'frontend',
				'metakey' => '',
				'metadesc' => '',
			),
			2 => 
			array (
				'pageID' => 27,
				'title' => 'About Us',
				'alias' => 'about-us',
				'note' => NULL,
				'created' => '0000-00-00 00:00:00',
				'updated' => '0000-00-00 00:00:00',
				'filename' => 'aboutus',
				'status' => 'enable',
				'access' => '{"1":"1","2":"0","3":"0"}',
				'allow_guest' => '1',
				'template' => 'frontend',
				'metakey' => '',
				'metadesc' => '',
			),
			3 => 
			array (
				'pageID' => 26,
				'title' => 'Contact Us',
				'alias' => 'contact-us',
				'note' => NULL,
				'created' => '0000-00-00 00:00:00',
				'updated' => '0000-00-00 00:00:00',
				'filename' => 'contactus',
				'status' => 'enable',
				'access' => '{"1":"0","2":"0","3":"0"}',
				'allow_guest' => '1',
				'template' => 'frontend',
				'metakey' => NULL,
				'metadesc' => NULL,
			),
			4 => 
			array (
				'pageID' => 35,
				'title' => 'FAQ',
				'alias' => 'faq',
				'note' => NULL,
				'created' => '0000-00-00 00:00:00',
				'updated' => '0000-00-00 00:00:00',
				'filename' => 'faq',
				'status' => 'enable',
				'access' => '{"1":"1","2":"0","3":"0"}',
				'allow_guest' => '1',
				'template' => 'frontend',
				'metakey' => NULL,
				'metadesc' => NULL,
			),
			5 => 
			array (
				'pageID' => 36,
				'title' => 'Portpolio',
				'alias' => 'portpolio',
				'note' => NULL,
				'created' => '0000-00-00 00:00:00',
				'updated' => '0000-00-00 00:00:00',
				'filename' => 'portpolio',
				'status' => 'enable',
				'access' => '{"1":"1","2":"0","3":"0"}',
				'allow_guest' => '1',
				'template' => 'frontend',
				'metakey' => '',
				'metadesc' => '',
			),
		));
	}

}
