<?php

namespace Tests\App\Controllers;
use CodeIgniter\Test\FeatureTestCase;

class HomeControllerTest extends FeatureTestCase
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

	public function testGetHome()
	{
		$res = $this->call('get', '/');
		$res->assertOK();
		$res->assertSee('welcome');
	}
}