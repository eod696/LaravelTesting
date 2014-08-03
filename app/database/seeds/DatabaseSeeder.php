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

		$this->call('UserTableSeed');
		$this->command->info('User table seeded successfully!');
	}
}

class UserTableSeed extends Seeder {
	public function run()
	{
		DB::table('users')->delete();

        User::create([
			'email' => 'foo@bar.com',
			'name' => 'Foo',
			'password' => Hash::make('password')
		]);
		User::create([
			'email' => 'bob@costas.com',
			'name' => 'Bob',
			'password' => Hash::make('password')
		]);
		User::create([
			'email' => 'john@doe.com',
			'name' => 'John',
			'password' => Hash::make('password')
		]);
	}
}
