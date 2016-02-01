<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard ();

		// $this->call('UserTableSeeder');

		Model::reguard ();
		$this->call ('SbClientsTableSeeder');
		$this->call ('SbProjectsTableSeeder');
		$this->call ('SbTicketcommentsTableSeeder');
		$this->call ('SbTicketsTableSeeder');
		$this->call ('SessionsTableSeeder');
		$this->call ('TbBlogcategoriesTableSeeder');
		$this->call ('TbBlogcommentsTableSeeder');
		$this->call ('TbBlogsTableSeeder');
		$this->call ('TbGroupsTableSeeder');
		$this->call ('TbGroupsAccessTableSeeder');
		$this->call ('TbMenuTableSeeder');
		$this->call ('TbModuleTableSeeder');
		$this->call ('TbNotificationTableSeeder');
		$this->call ('TbPagesTableSeeder');
		$this->call ('TbRestapiTableSeeder');
		$this->call ('TbUsersTableSeeder');
		$this->call ('ForumCategoriesTableSeeder');
		$this->call ('ForumCommentsTableSeeder');
		$this->call ('ForumPostsTableSeeder');
		$this->call ('ForumsTableSeeder');
	    $this->call('TbModuleTableSeeder');
        $this->call('TbGroupsAccessTableSeeder');
        $this->call('ForumCategoriesTableSeeder');
        $this->call('ForumCommentsTableSeeder');
        $this->call('ForumPostsTableSeeder');
        $this->call('ForumsTableSeeder');
        $this->call('TbMenuTableSeeder');
    }
}
