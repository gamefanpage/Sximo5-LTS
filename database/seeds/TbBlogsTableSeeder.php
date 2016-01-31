<?php

use Illuminate\Database\Seeder;

class TbBlogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tb_blogs')->delete();
        
        \DB::table('tb_blogs')->insert(array (
            0 => 
            array (
                'blogID' => 1,
                'CatID' => 2,
                'title' => 'Working With Artisan & Composer',
                'slug' => 'working-with-artisan-composer',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.&nbsp;Lorem ipsum dolor sit amet, consectetur</p>
<hr />
<p>adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>',
                'created' => '2014-02-22 00:00:00',
                'tags' => '7-things, tutorial , generator , builder',
                'status' => 'publish',
                'image' => NULL,
                'entryby' => 1,
            ),
            1 => 
            array (
                'blogID' => 2,
                'CatID' => 2,
                'title' => 'Bootstrap 3: What you need to know',
                'slug' => 'bootstrap-3-what-you-need-to-know',
            'content' => '<p><span style="color:rgb(113,113,113);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.</span></p>

<p><span style="color:rgb(113,113,113);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.</span></p>

<p><span style="color:rgb(113,113,113);"><br /></span></p>',
                'created' => '2014-02-22 00:00:00',
                'tags' => 'lorem, ipsum , solades',
                'status' => 'publish',
                'image' => NULL,
                'entryby' => 1,
            ),
            2 => 
            array (
                'blogID' => 3,
                'CatID' => 1,
                'title' => 'Creating New Pages',
                'slug' => 'creating-new-pages',
            'content' => '<p><span style="color:rgb(113,113,113);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. </span><span style="color:rgb(113,113,113);"><br /></span></p>

<p><span style="color:rgb(113,113,113);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. </span><span style="color:rgb(113,113,113);"><br /></span></p>',
                'created' => '2014-02-23 00:00:00',
                'tags' => 'pages, page builder , builder',
                'status' => 'publish',
                'image' => NULL,
                'entryby' => 1,
            ),
            3 => 
            array (
                'blogID' => 4,
                'CatID' => 1,
                'title' => 'Creating Modules',
                'slug' => 'creating-modules',
            'content' => '<p><span style="color:rgb(113,113,113);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. </span><span style="color:rgb(113,113,113);"><br /></span></p>',
                'created' => '2014-02-23 00:00:00',
                'tags' => 'module , builder',
                'status' => 'publish',
                'image' => NULL,
                'entryby' => 1,
            ),
            4 => 
            array (
                'blogID' => 5,
                'CatID' => 3,
                'title' => 'New from our blog',
                'slug' => 'new-from-our-blog',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec condimentum. Mauris convallis mauris at pellentesque volutpat.</p>',
                'created' => '2014-08-11 12:30:01',
                'tags' => 'no tags',
                'status' => 'publish',
                'image' => NULL,
                'entryby' => 1,
            ),
        ));
        
        
    }
}
