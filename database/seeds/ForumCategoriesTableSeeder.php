<?php

use Illuminate\Database\Seeder;

class ForumCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forum_categories')->delete();
        
        \DB::table('forum_categories')->insert(array (
            0 => 
            array (
                'CategoryID' => 1,
                'Name' => 'News',
                'ForumID' => 1,
                'Note' => 'Lastest News about Sximo Reloaded Version',
                'Ordering' => 1,
                'Allow' => '1',
            ),
            1 => 
            array (
                'CategoryID' => 2,
                'Name' => 'General Discussion ',
                'ForumID' => 1,
                'Note' => 'You can post your topic according all plugins/add/extension from sximo builder pack.',
                'Ordering' => 2,
                'Allow' => '1',
            ),
        ));
        
        
    }
}
