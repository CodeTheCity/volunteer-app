<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
		$this->call('GuestlistsTableSeeder');
		$this->call('CitiesTableSeeder');
		$this->call('SkillsTableSeeder');
		$this->call('LocationsTableSeeder');
		$this->call('OpportunitiesTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('Community_eventsTableSeeder');
	}

}