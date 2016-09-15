<?php
App::uses('AppModel', 'Model');
/**
 * Enrolment Model
 *
 * @property User $User
 * @property Course $Course
 */
class Enrolment extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

public $validate = array(
		'Course.course_id' => array(
			'unique' => array(
				'rule' => array('isUnique'),
				'required' => 'create',
				'message' => 'User already enrolled into course'
			)
		)
);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
