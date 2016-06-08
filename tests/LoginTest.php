<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
	/*
	 * A test case to test AuthController@login
	 */
	public function testLoginLanding()
	{
		$this->visit('/login')
			 ->see('login');
	}
    /*
	 * A test suite to test AuthController@authenticateAttempt
	 */
	public function testSuccessfulUserLogin()
	{
		$this->visit('/login')
			 ->type('jaiaidmobin@gmail.com', 'email')
			 ->type('123456', 'password')
			 ->press('Login')
			 ->seePageIs('/');
    }
	
	public function testSuccessfulAdminLogin()
	{
		$this->visit('/login')
			 ->type('adnan@gmail.com', 'email')
			 ->type('123456', 'password')
			 ->press('Login')
			 ->seePageIs('/admin-panel');
	}

	public function testUnsuccessfulLogin()
	{
		$this->visit('/login')
			 ->type('root1', 'email')
			 ->type('12345', 'password')
			 ->press('Login')
			 ->seePageIs('/login');
	}
	
	public function testPartialFormEmailLogin()
	{
		$this->visit('/login')
			 ->type('root', 'email')
			 ->press('Login')
			 ->seePageIs('/login')
			 ->see('The password field is required');
	}
	
	public function testPartialFormPasswordLogin()
	{
		$this->visit('/login')
			 ->type('123456', 'password')
			 ->press('Login')
			 ->seePageIs('/login')
			 ->see('The email field is required');
	}

	public function testBlankFormLogin()
	{
		$this->visit('/login')
			 ->press('Login')
			 ->seePageIs('/login')
			 ->see('The email field is required')
			 ->see('The password field is required');
	}
	
}
