<?php
/**
 * Enrolment Fixture
 */
class EnrolmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'enrolment_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'role' => array('type' => 'string', 'null' => false, 'default' => 'student', 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'waitlist' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'course_id' => 2,
			'enrolment_date' => '2016-01-01',
			'role' => 'student',
			'waitlist' => 0
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'course_id' => 1,
			'enrolment_date' => '2016-08-01',
			'role' => 'manager',
			'waitlist' => 0
		),
		array(
			'id' => 3,
			'user_id' => 1,
			'course_id' => 3,
			'enrolment_date' => '2016-07-01',
			'role' => 'kitchen-helper',
			'waitlist' => 0
		),
		array(
			'id' => 4,
			'user_id' => 2,
			'course_id' => 3,
			'enrolment_date' => '2016-07-01',
			'role' => 'student',
			'waitlist' => 0
		),
	);

}
