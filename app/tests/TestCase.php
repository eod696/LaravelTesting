<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
	
	/**
	 * Default prep for tests
	 */
	public function setUp()
	{
		parent::setUp();
		$this -> prepareForTests();
	}
	
	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}
	
	/**
	 * Migrates the database for sqlite:memory: and sets
	 * mail to pretend so emails are logged, not sent
	 */
	private function prepareForTests()
	{
		Artisan::call('migrate');
		Mail::pretend(true);
	}
}
