<?php
/**
 * Course Fixture
 */
class CourseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'days' => array('type' => 'string', 'null' => false, 'default' => 'thirty', 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'enrolments' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'enrolments_male' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'enrolments_female' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'gender' => array('type' => 'string', 'null' => false, 'default' => 'mixed', 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'unique_course' => array('column' => 'name', 'unique' => 1)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2016-08-01',
			'end_date' => '2016-08-30',
			'days' => 'Lorem ips',
			'enrolments' => 0,
			'enrolments_male' => 0,
			'enrolments_female' => 0,
			'gender' => 'female'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2016-01-01',
			'end_date' => '2016-01-10',
			'days' => 'Lorem ips',
			'enrolments' => 0,
			'enrolments_male' => 0,
			'enrolments_female' => 0,
			'gender' => 'male'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2016-07-01',
			'end_date' => '2016-07-03',
			'days' => 'Lorem ips',
			'enrolments' => 0,
			'enrolments_male' => 0,
			'enrolments_female' => 0,
			'gender' => 'mixed'
		),
	);

}
