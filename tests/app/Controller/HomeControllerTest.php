<?php

namespace App\Controllers;
use CodeIgniter\Test\FeatureTestCase;

class HomeControllerTest extends FeatureTestCase
{

	public function setUp(): void
	{
		parent::setUp();
	}

	public function tearDown(): void
	{
		parent::tearDown();
	}

	public function testGetHome()
	{
		$res = $this->call('get', '/');
		$res->assertOK();
		$res->assertSee('welcome');
	}
}