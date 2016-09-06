<?php
App::uses('Enrolment', 'Model');

/**
 * Enrolment Test Case
 */
class EnrolmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enrolment',
		'app.user',
		'app.course'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enrolment = ClassRegistry::init('Enrolment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enrolment);

		parent::tearDown();
	}

}
