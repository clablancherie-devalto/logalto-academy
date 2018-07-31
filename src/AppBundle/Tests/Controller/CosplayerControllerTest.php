<?php

namespace AppBundle\Tests\Controller;

use GuzzleHttp\Client;

class CosplayerControllerTest extends \PHPUnit_Framework_TestCase {

	/** @var Client */
	private $http;

	public function setUp() {
		$this->http = new \GuzzleHttp\Client(['base_uri' => 'http://localhost:80/cosplay-group-matcher/web/app_dev.php/']);
	}

	public function testPOST() {

		$username = 'cosplayer' . rand(0,999);
		$data = [
			'username' => $username,
			'password' => 'test',
			'email' => 'test@live.fr',
			'country' => 'ca'
		];

		//// 1) POST a cosplayer
		$response = $this->http->post('api/cosplayers', [
			'body' => json_encode($data)
		]);

		$this->assertEquals(201, $response->getStatusCode());
		$this->assertTrue($response->hasHeader('Location'));
		$finishedData = json_decode($response->getBody(), true);
		$this->assertArrayHasKey('username', $finishedData);

	}
}
