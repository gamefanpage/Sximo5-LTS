<?php

use Illuminate\Database\Seeder;

class ForumCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('forum_comments')->delete();
        
        
        
    }
}
