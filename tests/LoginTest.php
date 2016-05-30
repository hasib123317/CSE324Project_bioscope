<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
	/*
	 * A test suite to test AuthController@authenticateAttempt
	 */
	public function successfulUserLoginTest()
	{
		$this->visit('/login')
			 ->type('root', 'email')
			 ->type('123456', 'password')
			 ->press('btn-login')
			 ->seePageIs('/');
	}

	public function successfulAdminLoginTest()
	{
		$this->visit('/login')
			 ->type('adnan@gmail.com', 'email')
			 ->type('123456', 'password')
			 ->press('btn-login')
			 ->seePageIs('/admin-panel');
	}

	public function unsuccessfulLoginTest()
	{
		$this->visit('/login')
			 ->type('root1', 'email')
			 ->type('12345', 'password')
			 ->press('btn-login')
			 ->seePageIs('/login');
	}

	public function partialFormEmailLoginTest()
	{
		$this->visit('/login')
			 ->type('root', 'email')
			 ->press('btn-login')
			 ->seePageIs('/login');
			 ->->see('<li>The password field is required</li>')
	}
	
	public function partialFormPasswordLoginTest()
	{
		$this->visit('/login')
			 ->type('123456', 'password')
			 ->press('btn-login')
			 ->seePageIs('/login');
			 ->see('<li>The email field is required</li>')
	}

	public function blankFormLoginTest()
	{
		$this->visit('/login')
			 ->press('btn-login')
			 ->seePageIs('/login');
			 ->see('<li>The email field is required</li>')
			 ->see('<li>The password field is required</li>');
	}
}
