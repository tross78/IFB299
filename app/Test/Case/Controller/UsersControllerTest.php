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
		$this->testAction('/users/view/1');
		$this->assertInternalType('array', $this->vars['user']);
		$expected = array(
          'User' => array(
			'id' => '1',
			'username' => 'johndoe',
			'full_name' => 'John Doe',
			'password' => '34534532',
			'first_name' => 'John',
			'last_name' => 'Doe',
			'date_of_birth' => '2016-09-30',
			'gender' => 'male',
			'email_address' => 'tyson.ross@gmail.com',
			'residential_address' => 'Lorem ipsum dolor sit amet',
			'dietary_requirements' => 'Lorem ipsum dolor sit amet',
			'medical_requirements' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-30 10:13:28',
			'modified' => '2016-09-30 10:13:28',
			'permission' => 'student'
          )
		);
	  $this->assertEquals($expected, $this->vars['user']);
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
