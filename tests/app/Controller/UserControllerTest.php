<?php

namespace Tests\Support\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\URI;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;
use CodeIgniter\Test\Fabricator;

use Tests\Support\Models\UserFabricator;

use App\Controllers\Users;

class UserControllerTest extends CIDatabaseTestCase
{
	use ControllerTester;
	protected $migrate = false;
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

	public function testCreateUser()
	{
		$result = $this->controller(Users::class)
                       ->execute('create');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('Create Users'));


		$request = new IncomingRequest(new \Config\App(), new URI("http://localhost:8080/users/create"));

		$criteria = $this->fabricator->make()->toArray();
		$criteria['password'] = 'masdika00';
		$request->setMethod('post');
		$request->setGlobal('post', $criteria);
		
		$postresult = $this->withRequest($request)
						->controller(Users::class)
						->execute('create');
		
		var_dump($request);
		$this->assertTrue($result->isOK());
        $this->assertTrue($result->see('welcome'));
	}
}