<?php

use Illuminate\Database\Seeder;

class TbGroupsAccessTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tb_groups_access')->delete();
        
		\DB::table('tb_groups_access')->insert(array (
			0 => 
			array (
				'id' => 169,
				'group_id' => 1,
				'module_id' => 8,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			1 => 
			array (
				'id' => 170,
				'group_id' => 2,
				'module_id' => 8,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			2 => 
			array (
				'id' => 171,
				'group_id' => 3,
				'module_id' => 8,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			3 => 
			array (
				'id' => 199,
				'group_id' => 1,
				'module_id' => 7,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			4 => 
			array (
				'id' => 200,
				'group_id' => 2,
				'module_id' => 7,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			5 => 
			array (
				'id' => 201,
				'group_id' => 3,
				'module_id' => 7,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			6 => 
			array (
				'id' => 319,
				'group_id' => 1,
				'module_id' => 11,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"1"}',
			),
			7 => 
			array (
				'id' => 320,
				'group_id' => 2,
				'module_id' => 11,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			8 => 
			array (
				'id' => 321,
				'group_id' => 3,
				'module_id' => 11,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			9 => 
			array (
				'id' => 322,
				'group_id' => 1,
				'module_id' => 2,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			10 => 
			array (
				'id' => 323,
				'group_id' => 2,
				'module_id' => 2,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			11 => 
			array (
				'id' => 324,
				'group_id' => 3,
				'module_id' => 2,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			12 => 
			array (
				'id' => 343,
				'group_id' => 1,
				'module_id' => 1,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			13 => 
			array (
				'id' => 344,
				'group_id' => 2,
				'module_id' => 1,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			14 => 
			array (
				'id' => 345,
				'group_id' => 3,
				'module_id' => 1,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			15 => 
			array (
				'id' => 373,
				'group_id' => 1,
				'module_id' => 21,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"0"}',
			),
			16 => 
			array (
				'id' => 374,
				'group_id' => 2,
				'module_id' => 21,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			17 => 
			array (
				'id' => 375,
				'group_id' => 3,
				'module_id' => 21,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			18 => 
			array (
				'id' => 409,
				'group_id' => 1,
				'module_id' => 32,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			19 => 
			array (
				'id' => 410,
				'group_id' => 2,
				'module_id' => 32,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			20 => 
			array (
				'id' => 411,
				'group_id' => 3,
				'module_id' => 32,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			21 => 
			array (
				'id' => 412,
				'group_id' => 1,
				'module_id' => 33,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			22 => 
			array (
				'id' => 413,
				'group_id' => 2,
				'module_id' => 33,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			23 => 
			array (
				'id' => 414,
				'group_id' => 3,
				'module_id' => 33,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			24 => 
			array (
				'id' => 415,
				'group_id' => 1,
				'module_id' => 34,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			25 => 
			array (
				'id' => 416,
				'group_id' => 2,
				'module_id' => 34,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			26 => 
			array (
				'id' => 417,
				'group_id' => 3,
				'module_id' => 34,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			27 => 
			array (
				'id' => 418,
				'group_id' => 1,
				'module_id' => 35,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			28 => 
			array (
				'id' => 419,
				'group_id' => 2,
				'module_id' => 35,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			29 => 
			array (
				'id' => 420,
				'group_id' => 3,
				'module_id' => 35,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			30 => 
			array (
				'id' => 421,
				'group_id' => 1,
				'module_id' => 36,
				'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
			),
			31 => 
			array (
				'id' => 422,
				'group_id' => 2,
				'module_id' => 36,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
			32 => 
			array (
				'id' => 423,
				'group_id' => 3,
				'module_id' => 36,
				'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
			),
		));
	}

}
