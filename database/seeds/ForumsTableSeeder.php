<?php

use Illuminate\Database\Seeder;

class ForumsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forums')->delete();
        
        \DB::table('forums')->insert(array (
            0 => 
            array (
                'ForumID' => 1,
                'Name' => 'Sximo Reloaded',
                'Note' => 'Reloaded Version Demo',
                'Icon' => 'icon-rocket',
                'Color' => '447d3b',
                'Active' => '1',
            ),
            1 => 
            array (
                'ForumID' => 2,
                'Name' => 'Sximo 5.1.3 LTS',
                'Note' => 'Join our forum, and start discuss with us',
                'Icon' => 'icon-tux',
                'Color' => 'f8ac59',
                'Active' => '1',
            ),
        ));
        
        
    }
}
