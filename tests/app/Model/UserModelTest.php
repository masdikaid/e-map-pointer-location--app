<?php

namespace Tests\Support;

use Tests\Support\Database\DatabaseTest;
use CodeIgniter\Test\CIDatabaseTestCase;

class UserDatabaseTest extends CIDatabaseTestCase
{
	protected $migrate = true;
    protected $refresh  = true;
    protected $seed = "UserSeeder";


	public function setUp(): void
	{
		parent::setUp();
	}

	public function tearDown(): void
	{
		parent::tearDown();
	}

	public function testUserFindAll()
	{
		$model = model('UserModel');
		$objects = $model->findAll();

		$this->assertCount(30, $objects);
	}

	public function testUserSoftDelete()
	{
        $model = model('UserModel');

		$object = $model->first();
		$model->delete($object->id);

		$this->assertNull($model->find($object->id));

		$criteria = ['id' => $object->id, 'deleted_at' => null];
        $this->dontSeeInDatabase('users', $criteria);

        $criteria = ['deleted_at' => null];
        $this->seeNumRecords(29, 'users', $criteria);
	}
}
