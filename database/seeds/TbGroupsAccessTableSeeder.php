<?php

use Illuminate\Database\Seeder;

class TbGroupsAccessTableSeeder extends Seeder
{

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
                'id' => 1,
                'group_id' => 1,
                'module_id' => 5,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            1 => 
            array (
                'id' => 2,
                'group_id' => 2,
                'module_id' => 5,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            2 => 
            array (
                'id' => 3,
                'group_id' => 3,
                'module_id' => 5,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            3 => 
            array (
                'id' => 4,
                'group_id' => 1,
                'module_id' => 4,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            4 => 
            array (
                'id' => 5,
                'group_id' => 2,
                'module_id' => 4,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            5 => 
            array (
                'id' => 6,
                'group_id' => 3,
                'module_id' => 4,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            6 => 
            array (
                'id' => 7,
                'group_id' => 1,
                'module_id' => 6,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"1"}',
            ),
            7 => 
            array (
                'id' => 8,
                'group_id' => 2,
                'module_id' => 6,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            8 => 
            array (
                'id' => 9,
                'group_id' => 3,
                'module_id' => 6,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            9 => 
            array (
                'id' => 10,
                'group_id' => 1,
                'module_id' => 2,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            10 => 
            array (
                'id' => 11,
                'group_id' => 2,
                'module_id' => 2,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            11 => 
            array (
                'id' => 12,
                'group_id' => 3,
                'module_id' => 2,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            12 => 
            array (
                'id' => 13,
                'group_id' => 1,
                'module_id' => 1,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            13 => 
            array (
                'id' => 14,
                'group_id' => 2,
                'module_id' => 1,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            14 => 
            array (
                'id' => 15,
                'group_id' => 3,
                'module_id' => 1,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            15 => 
            array (
                'id' => 16,
                'group_id' => 1,
                'module_id' => 7,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"1","is_excel":"0"}',
            ),
            16 => 
            array (
                'id' => 17,
                'group_id' => 2,
                'module_id' => 7,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            17 => 
            array (
                'id' => 18,
                'group_id' => 3,
                'module_id' => 7,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            18 => 
            array (
                'id' => 19,
                'group_id' => 1,
                'module_id' => 8,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            19 => 
            array (
                'id' => 20,
                'group_id' => 2,
                'module_id' => 8,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            20 => 
            array (
                'id' => 21,
                'group_id' => 3,
                'module_id' => 8,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            21 => 
            array (
                'id' => 22,
                'group_id' => 1,
                'module_id' => 9,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            22 => 
            array (
                'id' => 23,
                'group_id' => 2,
                'module_id' => 9,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            23 => 
            array (
                'id' => 24,
                'group_id' => 3,
                'module_id' => 9,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            24 => 
            array (
                'id' => 25,
                'group_id' => 1,
                'module_id' => 10,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            25 => 
            array (
                'id' => 26,
                'group_id' => 2,
                'module_id' => 10,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            26 => 
            array (
                'id' => 27,
                'group_id' => 3,
                'module_id' => 10,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            27 => 
            array (
                'id' => 28,
                'group_id' => 1,
                'module_id' => 11,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            28 => 
            array (
                'id' => 29,
                'group_id' => 2,
                'module_id' => 11,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            29 => 
            array (
                'id' => 30,
                'group_id' => 3,
                'module_id' => 11,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            30 => 
            array (
                'id' => 31,
                'group_id' => 1,
                'module_id' => 12,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            31 => 
            array (
                'id' => 32,
                'group_id' => 2,
                'module_id' => 12,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            32 => 
            array (
                'id' => 33,
                'group_id' => 3,
                'module_id' => 12,
                'access_data' => '{"is_global":"0","is_view":"0","is_detail":"0","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"0"}',
            ),
            33 => 
            array (
                'id' => 34,
                'group_id' => 1,
                'module_id' => 13,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"1","is_edit":"1","is_remove":"1","is_excel":"1"}',
            ),
            34 => 
            array (
                'id' => 35,
                'group_id' => 2,
                'module_id' => 13,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"1"}',
            ),
            35 => 
            array (
                'id' => 36,
                'group_id' => 3,
                'module_id' => 13,
                'access_data' => '{"is_global":"1","is_view":"1","is_detail":"1","is_add":"0","is_edit":"0","is_remove":"0","is_excel":"1"}',
            ),
        ));
        
        
    }
}
