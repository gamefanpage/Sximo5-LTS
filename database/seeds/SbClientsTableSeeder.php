<?php

use Illuminate\Database\Seeder;

class SbClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sb_clients')->delete();
        
        \DB::table('sb_clients')->insert(array (
            0 => 
            array (
                'ClientID' => 1,
                'Company' => 'Mangopik TM',
                'About' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget nulla non elit porta mollis in ut massa. Ut congue gravida metus, at eleifend risus. Quisque condimentum ultricies neque vel aliquet. Etiam pellentesque arcu ligula, ut aliquam ligula auctor in. ',
                'Contact' => 'Mango',
                'Logo' => NULL,
                'UserID' => 1,
            ),
            1 => 
            array (
                'ClientID' => 2,
                'Company' => 'Beset LTD',
                'About' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget nulla non elit porta mollis in ut massa. Ut congue gravida metus, at eleifend risus. Quisque condimentum ultricies neque vel aliquet. Etiam pellentesque arcu ligula, ut aliquam ligula auctor in. ',
                'Contact' => 'Beset',
                'Logo' => NULL,
                'UserID' => 4,
            ),
        ));
        
        
    }
}
