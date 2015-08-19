<?php 

use Laracasts\TestDummy\Factory;

class AuthTest extends TestCase
{
	public function testRegisteringANewUser()
	{
		$credentials = ['email' => 'foo@example.com'];

		$this->register($credentials)
		->verifyInDatabase('users', $credentials)
		->andSeePageIs('/notices/create');

	}

	public function testShowingErrorsWhenRegistrationValidationFails()
	{

	}

	public function register(array $overrides)
	{
		$fields = $this->getRegisterFields($overrides);		
		//it returns the this object so that we can continue chaining
		return $this->visit('auth/register')->andSubmitForm('Register', $fields);		
		
	}

	public function getRegisterFields($overrides)
	{
		$user = Factory::attributesFor('App\User', $overrides);

		return $user + ['password_confirmation' => $fields['password']];

		//this is the same as 
		// return $user += ['password_confirmation' => $fields['password']];
	}
}

//7:12 Exampleworkflow and custom methods