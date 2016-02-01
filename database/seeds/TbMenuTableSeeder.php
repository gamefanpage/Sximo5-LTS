<?php

use Illuminate\Database\Seeder;

class TbMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tb_menu')->delete();
        
        \DB::table('tb_menu')->insert(array (
            0 => 
            array (
                'menu_id' => 1,
                'parent_id' => 0,
                'module' => 'portfolio',
                'url' => '',
                'menu_name' => 'Portfolio',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 4,
                'position' => 'top',
                'menu_icons' => '',
                'active' => '1',
                'access_data' => '{"1":"0","2":"0","3":"0"}',
                'allow_guest' => '1',
                'menu_lang' => '{"title":{"id":""}}',
            ),
            1 => 
            array (
                'menu_id' => 2,
                'parent_id' => 0,
                'module' => 'contact-us',
                'url' => '',
                'menu_name' => 'Contact Us',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 5,
                'position' => 'top',
                'menu_icons' => '',
                'active' => '1',
                'access_data' => '{"1":"0","2":"0","3":"0"}',
                'allow_guest' => '1',
                'menu_lang' => NULL,
            ),
            2 => 
            array (
                'menu_id' => 7,
                'parent_id' => 0,
                'module' => 'faq',
                'url' => '',
                'menu_name' => 'FAQ',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 3,
                'position' => 'top',
                'menu_icons' => '',
                'active' => '1',
                'access_data' => '{"1":"1","2":"0","3":"0"}',
                'allow_guest' => '1',
                'menu_lang' => NULL,
            ),
            3 => 
            array (
                'menu_id' => 12,
                'parent_id' => 0,
                'module' => 'about-us',
                'url' => '',
                'menu_name' => 'About',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 0,
                'position' => 'top',
                'menu_icons' => '',
                'active' => '1',
                'access_data' => '{"1":"0","2":"0","3":"0"}',
                'allow_guest' => '1',
                'menu_lang' => NULL,
            ),
            4 => 
            array (
                'menu_id' => 13,
                'parent_id' => 0,
                'module' => 'service',
                'url' => '',
                'menu_name' => 'Service',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 1,
                'position' => 'top',
                'menu_icons' => '',
                'active' => '1',
                'access_data' => '{"1":"0","2":"0","3":"0"}',
                'allow_guest' => '1',
                'menu_lang' => '{"title":{"id":""}}',
            ),
            5 => 
            array (
                'menu_id' => 14,
                'parent_id' => 0,
                'module' => 'sbproject',
                'url' => '',
                'menu_name' => 'Project',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 0,
                'position' => 'sidebar',
                'menu_icons' => 'fa fa-cloud-upload',
                'active' => '1',
                'access_data' => '{"1":"1","2":"1","3":"0"}',
                'allow_guest' => NULL,
                'menu_lang' => NULL,
            ),
            6 => 
            array (
                'menu_id' => 15,
                'parent_id' => 0,
                'module' => 'restapi',
                'url' => '',
                'menu_name' => 'RestApi ',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 1,
                'position' => 'sidebar',
                'menu_icons' => 'icon-skull2',
                'active' => '1',
                'access_data' => '{"1":"1","2":"0","3":"0"}',
                'allow_guest' => NULL,
                'menu_lang' => NULL,
            ),
            7 => 
            array (
                'menu_id' => 16,
                'parent_id' => 0,
                'module' => 'sbticket',
                'url' => '',
                'menu_name' => 'Tickets System',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 2,
                'position' => 'sidebar',
                'menu_icons' => 'icon-users',
                'active' => '1',
                'access_data' => '{"1":"1","2":"1","3":"0"}',
                'allow_guest' => NULL,
                'menu_lang' => NULL,
            ),
            8 => 
            array (
                'menu_id' => 17,
                'parent_id' => 0,
                'module' => 'blog',
                'url' => '',
                'menu_name' => 'Blog',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 2,
                'position' => 'top',
                'menu_icons' => '',
                'active' => '1',
                'access_data' => '{"1":"1","2":"1","3":"1"}',
                'allow_guest' => '1',
                'menu_lang' => NULL,
            ),
            9 => 
            array (
                'menu_id' => 18,
                'parent_id' => 0,
                'module' => 'sximoforum',
                'url' => '',
                'menu_name' => 'Board Discussion',
                'menu_type' => 'internal',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 3,
                'position' => 'sidebar',
                'menu_icons' => 'fa fa fa-comment',
                'active' => '1',
                'access_data' => '{"1":"1","2":"1","3":"1"}',
                'allow_guest' => '1',
                'menu_lang' => '{"title":{"id":""}}',
            ),
            10 => 
            array (
                'menu_id' => 19,
                'parent_id' => 18,
                'module' => 'sximoforum',
                'url' => '/sximoforum/show/1',
                'menu_name' => 'Sximo Reloaded Board',
                'menu_type' => 'external',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 0,
                'position' => 'sidebar',
                'menu_icons' => 'fa fa fa-comment',
                'active' => '1',
                'access_data' => '{"1":"1","2":"1","3":"1"}',
                'allow_guest' => NULL,
                'menu_lang' => '{"title":{"id":""}}',
            ),
            11 => 
            array (
                'menu_id' => 20,
                'parent_id' => 18,
                'module' => '',
                'url' => '/sximoforum/show/2',
                'menu_name' => 'Sximo 5.1.3 LTS',
                'menu_type' => 'external',
                'role_id' => NULL,
                'deep' => NULL,
                'ordering' => 1,
                'position' => 'sidebar',
                'menu_icons' => 'fa fa fa-comment',
                'active' => '1',
                'access_data' => '{"1":"1","2":"1","3":"1"}',
                'allow_guest' => NULL,
                'menu_lang' => '{"title":{"id":""}}',
            ),
        ));
        
        
    }
}
