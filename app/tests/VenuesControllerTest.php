<?php

class VenuesControllerTest extends TestCase {

	public function tearDown() {

		Mockery::close();

	}
	
	public function testIndex()
	{
		$crawler = $this->call('get', '/venues');

		$this->assertResponseOk();

		$this->assertViewHas('venues');
	}


	public function testShow() {

		
		$crawler = $this->call('get', '/venues/1');

		$this->assertResponseOk();

		$this->assertViewHas('venue');
	
	}

	public function testCreate() {

		$crawler = $this->call('get', '/venues/create');

		$this->assertResponseOk();
	
	}


}