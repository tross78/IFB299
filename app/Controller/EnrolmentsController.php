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
		

		//TODO: try to move this to the POST check below, in case params are null
		$course_full = $this->Enrolment->find('count', array(
					'fields' => array('Course.id'),
					'contain' => array('Course'),
					'conditions' => array(
						'Enrolment.role' => 'student',
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
			
		$is_student = $this->Enrolment->role == 'student';	//not working, needs to search what the user has in the role drop down box from the Add enrolements page.
		
		
		$this->set("course_full", FALSE);
		$this->set("wait_full", FALSE);
		$this->set("manager_full", FALSE);
		$this->set("teacher_full", FALSE);
		$this->set("kitchen_full", FALSE);

					
		//Code to set waitlist to 1 if course is full.
		if ($course_full && $is_student) {		//AG: this line is not working atm because $is_student is broken.
			$this->request->data['Enrolment']['waitlist'] = 1;
		}
		
		if ($this->request->is('post')) {
	//AG: was going to do the following for each type of server but that won't work, we need to find out what the current user is enrolling as and then determine what the checks are. eg, we should only check if the manager roles are full if the current user is trying to enrole as a manager.
	
			// if ($manager_full){
				// $this->Flash->error(__('This course is full. There is no waitlist for managers.'));
			// } else
			if ($wait_full){
				$this->Flash->error(__('This course is full. Your enrolment has not be saved.'));
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
					"Course.id" => $this->params['named']['course_id']
				)
			));
		} else {
			// if not, show every course
			$courses = $this->Enrolment->Course->find('list');
		}
		$this->set(compact('users', 'courses'));

        //gender seg
        //not really sure what i am doing at the moment, slowly trying to learn how to get the gender value from the user and the course to compare
        $wrong_gender = $this->Enrolment->find('count', array(
                    'fields' => array('Course.id'),
                    'contain' => array('Course'),
                    'conditions' => array(
                        "Course.gender" => $this->params['gender']['course_gender']
                    ))

            ) > 0;
        $this->set('wrong_gender', FALSE);
        echo $wrong_gender;
        if ($wrong_gender) {
            $this->set("wrong_gender", TRUE);
            echo "Wrong gender";
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
	public function delete($id = null) {
		$this->Enrolment->id = $id;
		if (!$this->Enrolment->exists()) {
			throw new NotFoundException(__('Invalid enrolment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enrolment->delete()) {
			$this->Flash->success(__('The enrolment has been deleted.'));
		} else {
			$this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
