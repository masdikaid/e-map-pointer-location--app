<?php

namespace Tests\App\Controllers;
use CodeIgniter\Test\FeatureTestCase;
use Tests\App\Models\UserFabricator;



class UserControllerTest extends FeatureTestCase
{
	protected $migrateOnce = true;
	protected $seedOnce = true;
    protected $refresh = true;
	protected $seed = 'UserSeeder';
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
	
	public function testUserList()
	{
		$res = $this->call('get', '/users');
		$res->assertOK();
		$res->assertSee('User List');
	}
	
	
	public function testSingleUser()
	{
		$user = $this->model->first();
		$res = $this->call('get', "/users/index/{$user->id}");
		$res->assertOK();
		$res->assertSee($user->name);
	}

	public function testGivenStringInSingleUser()
	{
		$this->expectException(\TypeError::class);
		$res = $this->call('get', "/users/index/as");
	}
	
	public function testInvalidSingleUser()
	{
		$this->expectException(\CodeIgniter\Exceptions\PageNotFoundException::class);
		$res = $this->call('get', "/users/index/100");
	}

	public function testDeleteUser()
	{
		$user = $this->model->first();
		$res = $this->call('get', "/users/delete/{$user->id}");
		$res->assertRedirect();

		$this->seeInDatabase('users', ['id' => $user->id]);
	}

	public function testInvalidDeleteUser()
	{
		$this->expectException(\CodeIgniter\Exceptions\PageNotFoundException::class);
		$res = $this->call('get', "/users/delete/100");
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
			'confirm_password' => 'masdikaid',
			'phone' => '085771002550'
		];

		$res = $this->call('post', '/users/create', $criteria);

		unset($criteria['password']);
		unset($criteria['confirm_password']);

		
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