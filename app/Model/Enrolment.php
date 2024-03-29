<?php
App::uses('AppModel', 'Model');
/**
 * Enrolment Model
 *
 * @property User $User
 * @property Course $Course
 */
class Enrolment extends AppModel {

public $course_enrolment_date;
	// The Associations below have been created with all possible keys, those that are not needed can be removed

// validation rules for enrolment form
public $validate = array(
		'course_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'A course_id is required'
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique', array('course_id', 'user_id'), false),
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
