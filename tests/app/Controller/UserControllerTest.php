<?php

namespace Tests\App\Controllers;
use CodeIgniter\Test\FeatureTestCase;



class UserControllerTest extends FeatureTestCase
{
	protected $migrateOnce = true;
    protected $refresh = true;
	protected $basePath = APPPATH . 'Database';
	protected $namespace = 'App';

	public function setUp(): void
	{
		parent::setUp();
	}

	public function tearDown(): void
	{
		parent::tearDown();
	}

	public function testGetCreateUser()
	{
		$res = $this->call('get', '/users/create');
		$res->assertOK();
		$res->assertSee('Create Users');
	}

	public function testPostCreateUser()
	{
		$criteria = [
			'name' => 'dika',
			'email' => 'masdika@gmail.com',
			'password' => 'masdikaid',
			'phone' => '085771002550'
		];

		$res = $this->call('post', '/users/create', $criteria);

		unset($criteria['password']);
		
		$res->assertOK();
		$res->assertRedirect();
		$this->seeInDatabase('users', $criteria);
	}

	public function testPostCreateUserInvalidData()
	{
		$res = $this->call('post', '/users/create', [
			'name' => 'di',
			'email' => 'masdika',
			'password' => 'ma',
			'phone' => '0'
		]);
		$res->assertOK();
		$res->assertSee('Create Users');

	}
}