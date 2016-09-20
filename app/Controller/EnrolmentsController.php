<?php
App::uses('AppController', 'Controller');
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
		$studentCap = 2;	//lower this value to test full students
		$waitCap = 1;	//lower this value to test full waitlist
		$managerCap = 1; //lower this value to test full managers
		$teacherCap = 1; //lower this value to test full assitant-teachers
		$kitchenCap = 1; //lower this value to test full kitchen-helpers
		
		$user_gender = AuthComponent::user('gender');
		
		
		$is_mixed = $this->Enrolment->Course->find('all', array(
					'fields' => array('Course.id'),
					'contain' => array('Enrolment'),
					'conditions' => array(
						'Course.gender' => 'mixed',
						"Course.id" => $this->params['named']['course_id']
					))
			);
		
		//TODO: try to move this to the POST check below, in case params are null
		$course_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course', 'User'),
					'conditions' => array(
						'Enrolment.role' => 'student',
						'User.gender' => $user_gender,
						"Course.id" => $this->params['named']['course_id']
					))
			) >= $studentCap;
		
		$wait_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.waitlist' => '1',
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $waitCap;
		
		$manager_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.role' => 'manager',
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $managerCap;
			
		$teacher_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.role' => 'assistant-teacher',
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $teacherCap;
			
		$kitchen_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.role' => 'kitchen-helper',
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $kitchenCap;
			
		$this->set("user_gender", $user_gender);
		$this->set("is_mixed", $is_mixed);
		
		$this->set("course_full", $course_full);
		$this->set("wait_full", $wait_full);
		$this->set("manager_full", $manager_full);
		$this->set("teacher_full", $teacher_full);
		$this->set("kitchen_full", $kitchen_full);
		
		if ($this->request->is('post')) {


		$is_student = $this->request->data['Enrolment']['role'] == 'student';	//seems to be working.
		$is_manager = $this->request->data['Enrolment']['role'] == 'manager';
		$is_teacher = $this->request->data['Enrolment']['role'] == 'assistant-teacher';
		$is_kitchen = $this->request->data['Enrolment']['role'] == 'kitchen-helper';

		$this->set("is_student", $is_student);
		$this->set("is_manager", $is_manager);
		$this->set("is_teacher", $is_teacher);
		$this->set("is_kitchen", $is_kitchen);

							
		//Code to set waitlist to 1 if course is full.
		if ($course_full && $is_student) {		//TR: rewrote is_student so may work
			$this->request->data['Enrolment']['waitlist'] = 1;
		}

	//AG: was going to do the following for each type of server but that won't work, we need to find out what the current user is enrolling as and then determine what the checks are. eg, we should only check if the manager roles are full if the current user is trying to enrole as a manager.
	
			if ($manager_full && $is_manager){
				$this->Flash->error(__('This course is full. There is no waitlist for managers.'));
			} elseif ($teacher_full && $is_teacher){
				$this->Flash->error(__('This course is full. There is no waitlist for assistant-teachers.'));
			} elseif ($kitchen_full && $is_kitchen){
				$this->Flash->error(__('This course is full. There is no waitlist for kitchen-helpers.'));
			} elseif ($wait_full && $is_student){
				$this->Flash->error(__('This course and its waitlist is full. Your enrolment has not be saved.'));
			} else {
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
		$this->set('is_old', $old_compare);
		
		// if course_id set in params show just that course
		if (isset($this->params['named']['course_id'])) {
			$courses = $this->Enrolment->Course->find('list', array(
				'conditions' => array(
					"Course.id" => $this->params['named']['course_id'],
				)
			));
		} else {
			// if not, show every course
			$courses = $this->Enrolment->Course->find('list');
		}
		$this->set(compact('users', 'courses'));

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

//ATTN: Code left here wile testing, will delete, using for reference.

/*	$is_student = $this->request->data['Enrolment']['role'] == 'student';	//seems to be working.

		//TR: select * from enrolments where enrolment_date < {current date} and course days is ten
		$current_date = date('Y-m-d');
		$old_compare = $this->Enrolment->find('count', array(
				'fields' => array('Enrolment.id', 'Enrolment.enrolment_date', 'Enrolment.user_id', 'Course.days'),
				'contain' => array('Course'),
				'conditions' => array(
					'DATE(enrolment_date) < ' => $current_date,
					'user_id' => AuthComponent::user('id'),
					'Course.days' => 'ten'
				)
			)
		) > 0;
		$this->set('is_old', $old_compare);*/

/*				$kitchen_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.role' => 'kitchen-helper',
						'Course.id' => $this->params['named']['course_id']
					))
			) >= $kitchenCap;*/

			//$is_mixed = $this->Course->gender == 'mixed';

	public function delete($id = null) {
		$this->Enrolment->id = $id;
		if (!$this->Enrolment->exists()) {
			throw new NotFoundException(__('Invalid enrolment'));
		}

		$c_date = date('Y-m-d');
		
		$commenced = $this->Enrolment->Course->find('all', array(
			'fields' => array('Course.start_date', 'Course.id'),
					'contain' => array('Enrolment'),
					'conditions' => array(
						'DATE(Course.start_date) < ' => $c_date,
						'Course.id' => $this->params['named']['course_id']
					))
			);


		$this->request->allowMethod('post', 'delete');
		if (!$commenced){
			if ($this->Enrolment->delete()) {
				$this->Flash->success(__('The enrolment has been deleted.'));
			} else {
				$this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
			}
		} else {
			$this->Flash->error(_('You cannot withdraw from a course after it has commenced.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * delete method
 *
 * @return void
 */
	//a function to handle the enrolment of the user who has been on the waitlist for the longest
	public function waitlistEnrol(){
		//$enrollee = 
		echo $this->Enrolment->field(
			'course_id',
			array('created <' => date('Y-m-d H:i:s')),
			'created ASC'
		);
		//return null;
	}
}
