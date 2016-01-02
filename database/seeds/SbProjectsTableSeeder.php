<?php

use Illuminate\Database\Seeder;

class SbProjectsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('sb_projects')->delete();
        
		\DB::table('sb_projects')->insert(array (
			0 => 
			array (
				'ProjectID' => 1,
				'ProjectName' => 'Web Commerce',
				'Description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget nulla non elit porta mollis in ut massa. Ut congue gravida metus, at eleifend risus. Quisque condimentum ultricies neque vel aliquet. Etiam pellentesque arcu ligula, ut aliquam ligula auctor in. </p>
<p>Morbi lacinia arcu nisl. Nam varius cursus neque, nec euismod leo dictum eget. Suspendisse tempor ipsum sagittis nibh feugiat, in consequat diam vehicula.</p>',
				'ClientID' => 1,
				'Status' => 'active',
				'Progress' => 80,
				'Teams' => '1,4',
				'Created' => '0000-00-00',
				'LastUpdate' => '2015-09-02',
				'DueDate' => '2015-09-02',
			),
			1 => 
			array (
				'ProjectID' => 2,
				'ProjectName' => 'File Sharing Module',
				'Description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget nulla non elit porta mollis in ut massa. Ut congue gravida metus, at eleifend risus. Quisque condimentum ultricies neque vel aliquet. Etiam pellentesque arcu ligula, ut aliquam ligula auctor in. </p>
<p>Morbi lacinia arcu nisl. Nam varius cursus neque, nec euismod leo dictum eget. Suspendisse tempor ipsum sagittis nibh feugiat, in consequat diam vehicula.</p>',
				'ClientID' => 2,
				'Status' => 'canceled',
				'Progress' => 67,
				'Teams' => '1',
				'Created' => '0000-00-00',
				'LastUpdate' => '0000-00-00',
				'DueDate' => '2015-09-02',
			),
			2 => 
			array (
				'ProjectID' => 3,
				'ProjectName' => 'Module Task Man',
				'Description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget nulla non elit porta mollis in ut massa. Ut congue gravida metus, at eleifend risus. Quisque condimentum ultricies neque vel aliquet. Etiam pellentesque arcu ligula, ut aliquam ligula auctor in. </p>
<p>Morbi lacinia arcu nisl. Nam varius cursus neque, nec euismod leo dictum eget. Suspendisse tempor ipsum sagittis nibh feugiat, in consequat diam vehicula.</p>',
				'ClientID' => 1,
				'Status' => 'active',
				'Progress' => 70,
				'Teams' => '1',
				'Created' => '0000-00-00',
				'LastUpdate' => '0000-00-00',
				'DueDate' => '2015-09-03',
			),
			3 => 
			array (
				'ProjectID' => 4,
				'ProjectName' => 'Redesign Project',
				'Description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget nulla non elit porta mollis in ut massa. Ut congue gravida metus, at eleifend risus. Quisque condimentum ultricies neque vel aliquet. Etiam pellentesque arcu ligula, ut aliquam ligula auctor in. </p>
<p>Morbi lacinia arcu nisl. Nam varius cursus neque, nec euismod leo dictum eget. Suspendisse tempor ipsum sagittis nibh feugiat, in consequat diam vehicula.</p>',
				'ClientID' => 2,
				'Status' => 'suspended',
				'Progress' => 50,
				'Teams' => '4',
				'Created' => '0000-00-00',
				'LastUpdate' => NULL,
				'DueDate' => NULL,
			),
		));
	}

}
