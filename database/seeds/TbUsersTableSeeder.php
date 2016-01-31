<?php

use Illuminate\Database\Seeder;

class TbUsersTableSeeder extends Seeder
{

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
                'login_attempt' => 0,
                'last_login' => '2015-12-11 21:05:34',
                'created_at' => '2016-01-31 13:22:22',
                'updated_at' => '2015-07-19 01:51:12',
                'reminder' => 'SNLyM4Smv12Ck8jyopZJMfrypTbEDtVhGT5PMRzxs',
                'activation' => NULL,
                'remember_token' => '2F7pFlylw96PbYRALgOXLrKiwqT0a2oe8cX8T3iqrOCAJalZGE7wqDlheUjM',
                'last_activity' => 1454227902,
            ),
        ));
        
        
    }
}
