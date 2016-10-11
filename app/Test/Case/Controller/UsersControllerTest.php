<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.enrolment',
		'app.course'
	);

/**
 * testLogin method
 *
 * @return void
 */
	public function testLogin() {
		$this->markTestIncomplete('testLogin not implemented.');
	}

/**
 * testLogout method
 *
 * @return void
 */
	public function testLogout() {
		$this->markTestIncomplete('testLogout not implemented.');
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/users/index');
    	$this->assertInternalType('array', $this->vars['users']);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->get('/users/view/1');
		// Check for a 2xx response code
		$this->assertResponseOk();
		// Assert partial response content
		$this->assertResponseContains('johndoe');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
