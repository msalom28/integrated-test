<?php

use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

class ExampleTest extends TestCase 
{	
	//If you are gonna be using this trait in different occassions
	//you can import this in the test case class
	use DatabaseTransactions;

	/** @test */
	public function it_displays_all_posts()
	{
		TestDummy::create('App\Post', ['title' => 'some post']);

		$this->visit('posts')->andSee('some post');

		// $this->visit('posts')->dump();
	}

	/** @test */
	public function it_publishes_a_new_post()
	{

		//If you want to generate Dummy data instead like this:
		//$post = TestDummy::attributesFor('App\Post');

		//and then you can enter your values like this:
		//$post['title'], $post['paragraph']

		//You can also submit your form like this:
		//->submitForm('Publish Post', $post)
		//->verifyInDatabase('posts', $post);
		//This is awesome!!
		

		$this->visit('posts/create')
			->type('Some Title', 'title')
			->type('The body', 'paragraph')
			->press('Publish Post')
			// ->see('Some Title')
			// ->onPage('posts');
			->verifyInDatabase('posts', ['title' => 'Some Title']); //or seeInDatabase();

	}

}
