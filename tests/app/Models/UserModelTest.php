<?php

namespace Tests\Support\Models;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\Fabricator;

use Tests\Support\Models\UserFabricator;

class UserDatabaseTest extends CIDatabaseTestCase
{
	protected $migrateOnce = true;
    protected $seedOnce = true;
    protected $seed = "UserSeeder";
	protected $table = 'users';
    protected $model;
    protected $fabricator;

	public function setUp(): void
	{
		parent::setUp();
        $this->model = new UserFabricator();
        $this->fabricator = new Fabricator($this->model);
		$this->fabricator->makeObject('App\Entities\UserEntity');
	}

	public function tearDown(): void
	{
		parent::tearDown();
	}

	public function testCheckUserTableAndSeeder()
	{
		$this->seeNumRecords(5, $this->table, []);
	}
	
    public function testInsertUser()
    {
		$this->fabricator->create(5);
		$this->seeNumRecords(10, $this->table, []);
    }
	
	public function testInsertInvalidUserData()
	{
		$criteria = [
			'name' => 'an',
			'email' => 'zero',
			'password' => '',
			'phone' => '0212'
		];
		$this->fabricator->setOverrides($criteria);
		
		try {
			$this->fabricator->create();
		} catch (\Throwable $th) {
			//code...
		}
		
		$this->dontSeeInDatabase($this->table, $criteria);
	}
	
	public function testSoftDeleteUser()
	{
		$user = $this->fabricator->create();
		$this->model->delete($user->id);

		$this->assertCount(10, $this->model->findAll());
		$this->seeNumRecords(11, $this->table, []);
	}

	public function testUpdateUser()
	{
		$criteria = [
			'name' => 'masdikaid',
			'email' => 'masdikaid@gmail.com',
			'password' => 'masdika00',
			'phone' => '085771002550'
		];
		$user = $this->model->first();
		$user->fill($criteria);
		$this->model->save($user);

		$user = $this->model->find($user->id);
		$criteria['password'] = $user->password;

		$this->seeInDatabase($this->table, $criteria);
	}

	public function testVerifyPassword()
	{
		$user = $this->model->first();
		$isverify = password_verify('masdika00', $user->password);
		$this->assertTrue($isverify);
	}		
}


