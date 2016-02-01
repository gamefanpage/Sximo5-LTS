<?php

use Illuminate\Database\Seeder;

class ForumPostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forum_posts')->delete();
        
        \DB::table('forum_posts')->insert(array (
            0 => 
            array (
                'PostID' => 1,
                'Title' => 'Welcome Message',
                'Alias' => NULL,
                'Content' => 'Welcome on this forum',
                'CategoryID' => 1,
                'Posted' => '2016-01-10 07:26:42',
                'Hint' => 2,
                'UserID' => 1,
                'Sticky' => '1',
            ),
        ));
        
        
    }
}
