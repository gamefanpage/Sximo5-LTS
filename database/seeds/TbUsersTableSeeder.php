<?php

use Illuminate\Database\Seeder;

class TbUsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_users')->delete();
        
		\DB::table('tb_users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'group_id' => 1,
				'username' => 'superadmin',
				'password' => '$2y$10$ty.TpWnEjBOk1hoI3M0WIOnyVvrjcyLZ4/7LE9fnBOVRtc4cZekkW',
				'email' => 'superadmin@mail.com',
				'first_name' => 'Root',
				'last_name' => 'Admin',
				'avatar' => '1.jpg',
				'active' => 1,
				'login_attempt' => 12,
				'last_login' => '2015-12-11 21:05:34',
				'created_at' => '2014-03-12 13:18:46',
				'updated_at' => '2015-07-19 01:51:12',
				'reminder' => 'SNLyM4Smv12Ck8jyopZJMfrypTbEDtVhGT5PMRzxs',
				'activation' => NULL,
				'remember_token' => '2F7pFlylw96PbYRALgOXLrKiwqT0a2oe8cX8T3iqrOCAJalZGE7wqDlheUjM',
				'last_activity' => 1449880060,
			),
			1 => 
			array (
				'id' => 2,
				'group_id' => 2,
				'username' => 'mangopik',
				'password' => '$2y$10$z4E59lXw3dUau6BRfAHcHe0IHtOl0s08KXnipiopBLkCXT3p/Zq0W',
				'email' => 'tfmore@mail.com',
				'first_name' => 'TFS',
				'last_name' => 'More',
				'avatar' => 'twitter-bootstrap.jpg',
				'active' => 1,
				'login_attempt' => 0,
				'last_login' => '2015-07-19 04:53:01',
				'created_at' => '2014-09-26 02:49:23',
				'updated_at' => '2015-07-19 02:03:33',
				'reminder' => NULL,
				'activation' => '6422344',
				'remember_token' => 'pNRZquiNE8RmIAG0Io47U24plN2lTa1eh2M99LR6C8XLHTOrYwW83WMswBjp',
				'last_activity' => 1437282212,
			),
		));
	}

}
