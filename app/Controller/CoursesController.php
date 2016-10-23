<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CoursesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $is_old = FALSE;

	public $helpers = array(
		'CourseEnrolment'
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Course->recursive = 0;
		$this->set('is_old', FALSE);

		// if user logged in, filter courses
		if (AuthComponent::user('id')) {
			// find only 10 day courses unless old student
			$current_date = date('Y-m-d');
			$is_old = $this->Course->Enrolment->find('count', array(
				    'fields' => array('Enrolment.id', 'Enrolment.enrolment_date', 'Enrolment.user_id', 'Course.days'),
					'contain' => array('Course'),
					'conditions' => array(
						'DATE(enrolment_date) < ' => $current_date,
						'user_id' => AuthComponent::user('id'),
						'Course.days' => 'ten'
					))
					) > 0;
			$this->set('is_old', TRUE);

			$course_users = $this->Course->Enrolment->find('all', array(
			'fields' => array('Enrolment.id', 'Enrolment.user_id', 'User.dietary_requirements'),
			'contain' => array('Course', 'User'),
			'conditions' => array(
				'user_id' => AuthComponent::user('id'),
				'Course.days' => 'ten'
			))
			) > 0;


			// if student, filter to only ten day courses
			if (AuthComponent::user('permission') == 'student') {
				$options = array(
					'conditions' => array(
						'Course.days' => 'ten',
                        'Course.gender' => array(AuthComponent::user('gender'), 'mixed')
					),
					'fields' => array(
						'Course.id',
						'Course.name',
						'Course.description',
						'Course.days',
						'Course.gender',
						'Course.start_date',
						'Course.end_date',
						'Course.enrolments',
						'Course.enrolments_male',
						'Course.enrolments_female',
						'Course.capacity',
					),
					'order' => array(
						'Course.name' => 'DESC'
					),
					'limit' => 10
				);
				$this->Paginator->settings = $options;
                //if user is old but not the manager, filter any day courses
			} else if (AuthComponent::user('permission') == 'server') {
                $options = array(
                    'conditions' => array(
                        'Course.gender' => array(AuthComponent::user('gender'), 'mixed')
                    ),
                    'fields' => array(
                        'Course.id',
                        'Course.name',
                        'Course.description',
                        'Course.days',
                        'Course.gender',
                        'Course.start_date',
                        'Course.end_date',
                        'Course.enrolments',
                        'Course.enrolments_male',
                        'Course.enrolments_female',
						'Course.capacity',
                    ),
                    'order' => array(
                        'Course.name' => 'DESC'
                    ),
                    'limit' => 10
                );
                $this->Paginator->settings = $options;

            }

			$this->set('courses', $this->Paginator->paginate('Course'));

		} else {
			// $options = array(
			// 	'conditions' => array(
			// 		'Course.days' => 'ten'
			// 	)
			// );
			// $this->Paginator->settings = $options;
			$this->set('courses', $this->Paginator->paginate('Course'));
		}

		//$enrolments = $this->Course->Enrolment->find('list');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));

		$this->set('enrolments', $this->Course->Enrolment->find('all', array(
			'fields' => array('Enrolment.id', 'Enrolment.user_id', 'Enrolment.course_id', 'Enrolment.role', 'User.id', 'User.first_name', 'User.last_name'),
			'contain' => array('User'),
			'conditions' => array(
				'course_id' => $id
			))
		));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$current_date = date('Y-m-d');
		if ($this->request->is('post')) {
			//AG: course length in days
			$cdays = $this->request->data['Course']['days'];

			//AG: end date. Set initially as the start date to be modified below
			$edate = new DateTime(implode('-', array(
					$this->request->data['Course']['start_date']['year'],
					$this->request->data['Course']['start_date']['month'],
					$this->request->data['Course']['start_date']['day']
					)));

			//Ag: Manually set end date to correct date depending on length
			if ($cdays == "three"){
				$edate->add(new DateInterval('P3D'));
			}else if ($cdays == "ten"){
				$edate->add(new DateInterval('P10D'));
			}else{
				$edate->add(new DateInterval('P30D'));
			}

			//AG: updates new end date.
			$this->request->data['Course']['end_date'] = $edate->format('Y-m-d');

			//AG: course start date
			$sdate = new DateTime(implode('-', array(
					$this->request->data['Course']['start_date']['year'],
					$this->request->data['Course']['start_date']['month'],
					$this->request->data['Course']['start_date']['day']
					)));

			if (($sdate->format('Y-m-d')) < $current_date){
				$this->Flash->error(__('You cannot schedule a course for a date that has already past.'));
			}else if ($this->request->data['Course']['name'] == ""){
				$this->Flash->error(__('A course must have a name.'));
			}else if ($this->request->data['Course']['description'] == ""){
				$this->Flash->error(__('A course must have a description.'));
			}else if ($this->request->data['Course']['capacity'] < 1 || $this->request->data['Course']['capacity'] > 26){
				$this->Flash->error(__('A course must have a valid capacity (between 1 and 26).'));
			}else{
				$this->Course->create();
				if ($this->Course->save($this->request->data)) {
					$this->Flash->success(__('The course has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The course could not be saved. Please, try again.'));
				}
			}

		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$current_date = date('Y-m-d');
		if ($this->request->is(array('post', 'put'))) {
			//AG: course length in days
			$cdays = $this->request->data['Course']['days'];

			//AG: end date. Set initially as the start date to be modified below
			$edate =  new DateTime(implode('-', array(
					$this->request->data['Course']['start_date']['year'],
					$this->request->data['Course']['start_date']['month'],
					$this->request->data['Course']['start_date']['day']
					)));

			//Ag: Manually set end date to correct date depending on length
			if ($cdays == "three"){
				$edate->add(new DateInterval('P3D'));
			}else if ($cdays == "ten"){
				$edate->add(new DateInterval('P10D'));
			}else{
				$edate->add(new DateInterval('P30D'));
			}

			//AG: updates new end date.
			$this->request->data['Course']['end_date'] = $edate->format('Y-m-d');

			//AG: course start date
			$sdate = new DateTime(implode('-', array(
					$this->request->data['Course']['start_date']['year'],
					$this->request->data['Course']['start_date']['month'],
					$this->request->data['Course']['start_date']['day']
					)));

			if (($sdate->format('Y-m-d')) < $current_date){
				$this->Flash->error(__('You cannot schedule a course for a date that has already past.'));
			}else if ($this->request->data['Course']['name'] == ""){
				$this->Flash->error(__('A course must have a name.'));
			}else if ($this->request->data['Course']['description'] == ""){
				$this->Flash->error(__('A course must have a description.'));
			}else if ($this->request->data['Course']['capacity'] < 1 || $this->request->data['Course']['capacity'] > 26){
				$this->Flash->error(__('A course must have a valid capacity (between 1 and 26).'));
			}else{
				if ($this->Course->save($this->request->data)) {
					$this->Flash->success(__('The course has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The course could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

//JM: Editing funciton to delete enrolled users from the course at the same time
	public function delete($id = null) {
		/*$query = $this->Course->Enrolments->find('all', array('conditions' => array("Course.id" => $this->params['named']['course_id'])));
        $current_date = date('Y-m-d');*/

		$this->Course->id = $id;

        //HG: check if the course has already commenced
        //dosen't work yet!

/*        $course_started = $this->Course->Enrolment->find('count', array(
            'fields' => array('Course.id', 'Course.start_date', 'Course.end_date'),
            'contain' => array('Course'),
            'conditions' => array(
                'DATE(Course.start_date) <' => $current_date,
                'DATE(Course.end_date) >' => $current_date,
                'Course.id' => $this->params['named']['course_id']
            )
        )) > 0;
        //HG: set
        $this->set("course_started", $course_started);*/

/*        if($course_started) {
            throw new CourseStartedException(__('Course already started'));
        }
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}*/

/*$this->Course->Enrolment->find('all', array(
			'fields' => array('Enrolment.id', 'Enrolment.user_id', 'Enrolment.course_id', 'Enrolment.role', 'User.id', 'User.first_name', 'User.last_name'),
			'contain' => array('User'),
			'conditions' => array(
				'course_id' => $id
			))
		)*/


		$enrolledIDS = $this->Course->Enrolment->find('all', array(
			'field' => array('Enrolment.user_id','User.email_address', 'Course.start_date', 'User.first_name'),
			'contain' => array('User', 'Course'),
			'conditions' => array(
				'course_id' => $id)));

		foreach ($enrolledIDS as $enrolledID) {

	    	$Email = new CakeEmail('gmail');
/*	  		$Email->sender('admin@team-hawk.herokuapp.com', 'Hawke Meditation Centre');
	  		$Email->from(array('admin@team-hawk.herokuapp.com' => 'Hawke Meditation Centre'));*/
	  		$Email->returnPath('teamhawkemeditation@gmail.com');
	  		$Email->sender('teamhawkemeditation@gmail.com', 'Hawke Meditation Centre');
	  		$Email->from(array('teamhawkemeditation@gmail.com' => 'Hawke Meditation Centre'));
	  		$Email->to($enrolledID['User']['email_address']);
	  		$Email->subject('Changes to your Meditation Course');
	  		//LEAVE LINES SPACED HOW THEY ARE - used to make email look good.
	  		$Email->send('Hi ' . $enrolledID['User']['first_name'] .',
	  			The course you have enrolled in beggining on the ' . $enrolledID['Course']['start_date'] . ' is no longer being continued. We are sorry for the inconvenience.

	  			Team Hawke');

	  }

		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {

			$this->Course->Enrolment->deleteAll(array('Enrolment.course_id' => $id, false, false));

			$this->Flash->success(__('The course has been deleted.'));
		} else {
			$this->Flash->error(__('The course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	//checking which courses have a start date is 10 days from the current date
	//this function has to be automatically executed each day, cronjob looked like a good method
	public function confirmationEmail() {

	  //ZT: the date the email should be sent must be 10 days prior to the starting course date,
	  //    therefore the starting date must equal the current date plus 10 days
		$current_date = date('Y-m-d');

		$current_date_plus_ten = $current_date->add(new DateInterval('P10D'));

		//ZT: retrieve the start date and relative course id for dates that match the '$current_date_plus_ten'
		// Extraction: from COURSES table
		$retrieveCourseIDs = $this->Enrolment->Course->find('all', array(
		  'fields' => array('Course.id'),
		      'conditions' => array(
		        'DATE(Course.start_date) == ' => $current_date_plus_ten,
		      ))
		  );

		//ZT: find user ID's that have the same course Id as the one that relates to start date retrieved
		// Extraction: from ENROLMENTS table
		$retrieveUserIDs = $this->Enrolment->find('all', array(
		  'fields' => array('Enrolment.course_id', 'Enrolment.user_id'),
		      'conditions' => array(
		        'Enrolment.course_id == ' => $retrieveCourseIDs,
		      ))
		  );

	  //ZT: find emails of users which have a user ID in the '$retrieveUserEmail' array
	  // Extraction: from USERS table
	  for ($i = 0; $i < sizeof($retrieveUserIDs); $i++) {

	    $retrieveUserEmail = $this->Enrolment->User->find('all', array(
	      'fields' => array('User.email_address'),
	          'conditions' => array(
	            'User.id == ' => $retrieveUserIDs[$i],
	          ))
	      );

	      $Email = new CakeEmail('gmail');
	  		$Email->returnPath('admin@team-hawk.herokuapp.com');
	  		$Email->sender('teamhawkemeditation@gmail.com', 'Hawke Meditation Centre');
	  		$Email->from(array('teamhawkemeditation@gmail.com' => 'Hawke Meditation Centre'));
	  		$Email->to($retrieveUserEmail[$i]);
	  		$Email->subject('About');
	  		$Email->send('Hi, this is a confirmation email for your Meditation course.');

	  }
	}



}
