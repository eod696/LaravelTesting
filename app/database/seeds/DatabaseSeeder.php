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
		$this->command->info('users table seeded successfully!');
		$this->call('ContentPagesTableSeed');
		$this->command->info('content_pages table seeded successfully!');
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

class ContentPagesTableSeed extends Seeder {
	public function run() 
	{
		DB::table('content_pages')->delete();
		
		Page::create([
			'slug' => 'test1',
			'title' => 'Test Page 1',
			'body' => 'Lorem ipsum dolor sit amet, ex vim atqui dicta moderatius, sit saepe vidisse no. Eum cu vero elaboraret delicatissimi, ullum inani qualisque his id. Habeo copiosae cu sit, assum solet recusabo eam et. Eu putant maluisset repudiandae sed, habeo idque minimum id nec, verterem theophrastus disputationi id his. Elaboraret necessitatibus te mei, an quas voluptatum contentiones has, probatus consulatu scribentur et vix.'
							.'Nam no elitr virtute bonorum, posse ludus te mea. Vis soleat molestie ut, ius ludus oporteat consectetuer eu. Et eos summo adipisci, liber clita omittantur ut vim. Qui ut tamquam tacimates quaestio, quando moderatius vix an.'
							.'An has agam repudiare. Per quando lucilius prodesset in, no ocurreret abhorreant qui. Splendide consetetur in eos, et nec quot paulo omnes. Est erat dicta constituam ei, qui quod nostrum adipisci ne. In pro saepe eripuit dolorum. Ut vix esse viderer euismod.'
							.'Vis ne graeco principes. No quo dicat solet officiis. Nullam commune et quo, saepe virtute ea per. Has at novum officiis apeirian, vim timeam oportere at. Vis id ipsum malorum vulputate. Agam autem nusquam no mei, quo ad amet nusquam vituperata, dictas omittam salutandi quo ex.'
							.'Cu nisl assum mandamus qui, sale timeam eu nec. Prima accommodare mea ut, at eos affert consectetuer. Vim molestiae contentiones te, cu qui noster voluptatum. Has id alterum dolorem, eos cibo assentior theophrastus an, cum ad putent eligendi percipit. Vide postea cu ius, te quo tractatos splendide laboramus.'
		]);
	}
}
