<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'length' => 25, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => '\'\'', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => '\'\'', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'date_of_birth' => array('type' => 'date', 'null' => false, 'default' => null),
		'gender' => array('type' => 'string', 'null' => false, 'default' => 'male', 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email_address' => array('type' => 'string', 'null' => false, 'default' => '\'\'', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'residential_address' => array('type' => 'string', 'null' => false, 'default' => '\'\'', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dietary_requirements' => array('type' => 'string', 'null' => true, 'default' => 'none', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'medical_requirements' => array('type' => 'string', 'null' => true, 'default' => 'none', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'permission' => array('type' => 'string', 'null' => false, 'default' => 'student', 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'username' => array('column' => 'username', 'unique' => 1)
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
			'username' => 'Lorem ipsum dolor sit a',
			'password' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'date_of_birth' => '2016-09-30',
			'gender' => 'Lorem ips',
			'email_address' => 'Lorem ipsum dolor sit amet',
			'residential_address' => 'Lorem ipsum dolor sit amet',
			'dietary_requirements' => 'Lorem ipsum dolor sit amet',
			'medical_requirements' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-30 10:13:28',
			'modified' => '2016-09-30 10:13:28',
			'permission' => 'Lorem ips'
		),
	);

}
