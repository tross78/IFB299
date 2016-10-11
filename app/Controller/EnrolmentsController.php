<?php
App::uses('AppController', 'Controller');
use Cake\ORM\TableRegistry;
/**
 * Enrolments Controller
 *
 * @property Enrolment $Enrolment
 * @property PaginatorComponent $Paginator
 */
class EnrolmentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function isAuthorized($user) {

		if (in_array($this->action, array('add', 'edit', 'delete'))) {
			if ($user['id'] == $this->Auth->user('id') || $user['permission'] == 'manager') {
				return true;
			} else {
				return false;
			}

		}

		return parent::isAuthorized($user);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enrolment->recursive = 0;
		$this->Paginator->settings = array(
        'Enrolments' => array(
            'order' => array('Course.name' => 'desc'),
            'group' => array('Course.name', 'User.name', 'User.role')
			)
		);
		$this->set('enrolments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enrolment->exists($id)) {
			throw new NotFoundException(__('Invalid enrolment'));
		}
		$options = array('conditions' => array('Enrolment.' . $this->Enrolment->primaryKey => $id));
		$this->set('enrolment', $this->Enrolment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//AG: the following are the capacities for each possible enrolment role in a course, (students -> kitchen-helpers -> assistant-teachers -> managers)
		$studentCap = 2;	//set to 2 for testing purposes to test '$course_full', normal student capacity will be 26.
		$kitchenCap = 1; //set to 1 for testing purposes to test '$kitchen_full', normal student capacity will be 5.
		$teacherCap = 1; //normal assistant-teacher capacity is 1.
		$managerCap = 1; //normal manager capacity is 1.

		//AG: this sets the capacity of the waitlist for students when the sudent capacity has been met. Only students get a waitlisted.
		$waitCap = 1;	//set to 1 for testing purposes to test '$wait_full', normal waitlist capacity will be 7.

		//AG: Grabs the gender of the user currently logged in.
		$user_gender = AuthComponent::user('gender');


		//AG: Unused Variable to determine wether the current course is of mixed gender. May need it in the future though.
		$is_mixed = $this->Enrolment->Course->find('all', array(
					'fields' => array('Course.id'),
					'contain' => array('Enrolment'),
					'conditions' => array(
						'Course.gender' => 'mixed',
						"Course.id" => $this->params['named']['course_id']
					))
			);

		//AG: Unused variable to determine wether the current course is of mixed gender. May need it in the future though.
		$is_male = $this->Enrolment->Course->find('all', array(
					'fields' => array('Course.id'),
					'contain' => array('Enrolment'),
					'conditions' => array(
						'Course.gender' => 'male',
						"Course.id" => $this->params['named']['course_id']
					))
			);

		//AG: Unused variable to determine wether the current course is of mixed gender. May need it in the future though.
		$is_female = $this->Enrolment->Course->find('all', array(
					'fields' => array('Course.id'),
					'contain' => array('Enrolment'),
					'conditions' => array(
						'Course.gender' => 'female',
						"Course.id" => $this->params['named']['course_id']
					))
			);

		//AG: says 'course_full' but is actually to check if the number of students enrolled in this course has reached the student capacity.
		$course_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.role' => 'student',
						'User.gender' => $user_gender,
						"Course.id" => $this->params['named']['course_id']
					))
			) >= $studentCap;

		//AG: to check if the number of students on the waitlist for this course has reached the waitlist capacity.
		$wait_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.waitlist' => '1',
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $waitCap;

		//AG: to check if the number of managers enrolled in this course has reached the manager capacity.
		$manager_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.role' => 'manager',
						'User.gender' => $user_gender,
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $managerCap;

		//AG: to check if the number of assistant-teachers enrolled in this course has reached the teacher capacity.
		$teacher_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.role' => 'assistant-teacher',
						'User.gender' => $user_gender,
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $teacherCap;

		//AG: to check if the number of kitchen-helpers enrolled in this course has reached the kitchen capacity.
		$kitchen_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.role' => 'kitchen-helper',
						'User.gender' => $user_gender,
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $kitchenCap;

		//AG: sets
		$this->set("user_gender", $user_gender);
		$this->set("is_mixed", $is_mixed);
		$this->set("is_male", $is_male);
		$this->set("is_female", $is_female);
		$this->set("course_full", $course_full);
		$this->set("wait_full", $wait_full);
		$this->set("manager_full", $manager_full);
		$this->set("teacher_full", $teacher_full);
		$this->set("kitchen_full", $kitchen_full);

		//AG: post conditions after the enrolment form has been submitted
		if ($this->request->is('post')) {

		//AG: checks to see what the current user has attempted to enroll as
		$is_student = $this->request->data['Enrolment']['role'] == 'student';
		$is_manager = $this->request->data['Enrolment']['role'] == 'manager';
		$is_teacher = $this->request->data['Enrolment']['role'] == 'assistant-teacher';
		$is_kitchen = $this->request->data['Enrolment']['role'] == 'kitchen-helper';

		//AG: More sets
		$this->set("is_student", $is_student);
		$this->set("is_manager", $is_manager);
		$this->set("is_teacher", $is_teacher);
		$this->set("is_kitchen", $is_kitchen);

		//Ag: Manually set enrolment date to current date
		$this->request->data['Enrolment']['enrolment_date'] = date('Y-m-d');
		
		//AG: Code to set waitlist to 1 if course is full.
		if ($course_full && $is_student) {
			$this->request->data['Enrolment']['waitlist'] = 1;
		}

	//AG: The following displays error messages to the user if they are unable to enroll. Otherwise, it enrols them and saves the data in the database.
			if ($manager_full && $is_manager){
				$this->Flash->error(__('This course is full. There is no waitlist for managers.'));
			} elseif ($teacher_full && $is_teacher){
				$this->Flash->error(__('This course is full. There is no waitlist for assistant-teachers.'));
			} elseif ($kitchen_full && $is_kitchen){
				$this->Flash->error(__('This course is full. There is no waitlist for kitchen-helpers.'));
			} elseif ($course_full && $wait_full && $is_student){
				$this->Flash->error(__('This course and its waitlist is full. Your enrolment has not be saved.'));
			} elseif (($is_male && $user_gender == 'female')||($is_female && $user_gender == 'male')){
				$this->Flash->error(__('Not even managers can enrol in courses for opposite gender.'));
			}  else {
				$this->Enrolment->create();
				if ($this->Enrolment->save($this->request->data)) {
					$this->Flash->success(__('The enrolment has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
				}
			}
		}
		$users = $this->Enrolment->User->find('list');

		//TR: select * from enrolments where enrolment_date < {current date} and course days is ten
		$current_date = date('Y-m-d');
		$old_compare = $this->Enrolment->find('count', array(
				'fields' => array('Enrolment.id', 'Enrolment.enrolment_date', 'Enrolment.user_id', 'Course.days'),
				'contain' => array('Course'),
				'conditions' => array(
					'DATE(enrolment_date) < ' => $current_date,
					'user_id' => AuthComponent::user('id'),
					'Course.days' => 'ten'
				))
				) > 0;
		//added this so if they are old they will be given server permissions. If anything is broken this is it.
		if ((($old_compare) && (AuthComponent::user('permission') == "student")) || (AuthComponent::user('permission') == "server")) {
			$this->Enrolment->User->id = AuthComponent::user('id');
			$this->Enrolment->User->saveField('permission',"server");
		}
		$this->set('is_old', $old_compare);
		$course_enrolment_date = NULL;

		// if course_id set in params show just that course
		if (isset($this->params['named']['course_id'])) {
			$courses = $this->Enrolment->Course->find('list', array(
				'conditions' => array(
					"Course.id" => $this->params['named']['course_id'],
				)
			));
			// $this->request->data['Enrolment']['course_start_date']
			$course_enrolment_date = $this->Enrolment->Course->find('first', array(
				'fields' => array('Course.start_date'),
				'conditions' => array(
					"Course.id" => $this->params['named']['course_id'],
				)
			))['Course']['start_date'];
			$this->Enrolment->set('course_enrolment_date', $course_enrolment_date);
		} else {
			// if not, show every course
			$courses = $this->Enrolment->Course->find('list');
		}
		$this->set(compact('users', 'courses', 'course_enrolment_date'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enrolment->exists($id)) {
			throw new NotFoundException(__('Invalid enrolment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//Ag: Manually set enrolment date to current date
			$this->request->data['Enrolment']['enrolment_date'] = date('Y-m-d');
			if ($this->Enrolment->save($this->request->data)) {
				$this->Flash->success(__('The enrolment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enrolment.' . $this->Enrolment->primaryKey => $id));
			$this->request->data = $this->Enrolment->find('first', $options);
		}
		$users = $this->Enrolment->User->find('list');
		$courses = $this->Enrolment->Course->find('list');
		$this->set(compact('users', 'courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
//JM: added check to make sure you cannot withdraw from a courese
//once the start date has been reached, or passed.

	public function delete($id = null) {
		$this->Enrolment->id = $id;
		if (!$this->Enrolment->exists()) {
			throw new NotFoundException(__('Invalid enrolment'));
		}

		$c_date = date('Y-m-d');

//commented cause it was giving me an error and idk why
/*		$commenced = $this->Enrolment->Course->find('all', array(
			'fields' => array('Course.start_date', 'Course.id'),
					'contain' => array('Course', 'Enrolment'),
					'conditions' => array(
						'DATE(Course.start_date) < ' => $c_date
						//'Course.id' => $this->params['named']['course_id']
					))
			);
*/

		$this->request->allowMethod('post', 'delete');
//		if (!$commenced){
			if ($this->Enrolment->delete()) {
				$this->waitlistEnrol();
				$this->request->data['Enrolment']['waitlist'] = 0;
				$this->Flash->success(__('The enrolment has been deleted.'));
			} else {
				$this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
			}
//		} else {
//			$this->Flash->error(_('You cannot withdraw from a course after it has commenced.'));
//		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * waitlistAutoEnrol method
 *
 * @return void
 */
	//a function to handle the enrolment of the user who has been on the waitlist for the longest
	public function waitlistEnrol(){
		echo "it's ya boy";
		$studentCap = 2;
		$longest = $this->Enrolment->find('first', array(
					'fields' => array('MAX(Enrolment.id) AS id', 'Enrolment.course_id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.id' => 1,
					))
			);
			//echo $this('sql_dump');

		$course_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.role' => 'student',
					))
			) >= $studentCap;
		//	echo $this->Enrolment('sql_dump');

			$this->set("course_full", $course_full);
			if(!$course_full) {
				$this->Enrolment->create();
				if ($this->Enrolment->save($longest->request->data)) {
					$this->Flash->success(__('The enrolment has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
				}
			}

		/*
		$enrollee =
		echo $this->Enrolment->field(
			'course_id',
			array('created <' => date('Y-m-d H:i:s')),
			'created ASC'
		);
		return null; */
	}

	//checking which courses have a start date is 10 days from the current date
	//this function has to be automatically executed each day, cronjob looked like a good method
	public function confirmationEmail() {

	  //ZT: the date the email should be sent must be 10 days prior to the starting course date,
	  //    therefore the starting date must equal the current date plus 10 days
	  $current_date_plus_ten = date('Y-m-d', strtotime('+10 days'));

	  //ZT: retrieve the start date and relative course id for dates that match the '$current_date_plus_ten'
	  // Extraction: from COURSES table
	  $retrieveStartDates = $this->Enrolment->Course->find('all', array(
	    'fields' => array('Course.id'),
	        'conditions' => array(
	          'DATE(Course.start_date) == ' => $current_date_plus_ten,
	        ))
	    );

	  //ZT: find user ID's that have the same course Id has the one that relates to start date retrieved
	  // Extraction: from ENROLMENTS table
	  $retrieveUserIDs = $this->Enrolment->find('all', array(
	    'fields' => array('Enrolment.course_id', 'Enrolment.user_id'),
	        'conditions' => array(
	          'Enrolment.course_id == ' => $retrieveStartDates,
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
	  		$Email->sender('admin@team-hawk.herokuapp.com', 'Hawke Meditation Centre');
	  		$Email->from(array('admin@team-hawk.herokuapp.com' => 'Hawke Meditation Centre'));
	  		$Email->returnPath('admin@team-hawk.herokuapp.com');
	  		$Email->sender('teamhawkemeditation@gmail.com', 'Hawke Meditation Centre');
	  		$Email->from(array('teamhawkemeditation@gmail.com' => 'Hawke Meditation Centre'));
	  		$Email->to($retrieveUserEmail[0]);
	  		$Email->subject('About');
	  		$Email->send('Hi, this is a confirmation email for your Meditation course.');

	  }
	}
}
