<?php
App::uses('AppModel', 'Model');
/**
 * Course Model
 *
 * @property Enrolment $Enrolment
 */
class Course extends AppModel {


	public $displayField = 'name';
	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Enrolment' => array(
			'className' => 'Enrolment',
			'foreignKey' => 'course_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
