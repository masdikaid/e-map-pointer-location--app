<?php

namespace Tests\Support\Controllers;
use CodeIgniter\Test\CIDatabaseTestCase;
use CodeIgniter\Test\ControllerTester;
use App\Controllers\Home;


class HomeControllerTest extends CIDatabaseTestCase
{
	use ControllerTester;
	protected $migrate = false;

	public function testShowHomePage()
	{
		$result = $this->controller(Home::class)
                       ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('Welcome to CodeIgniter'));
	}
}


