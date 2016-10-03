<?php
App::uses('AppController', 'Controller');
//JM: Possibly need this to use enrolments deletion in this file
App::import('Controller', 'Enrolments');
// Instantiation
$Enrolments = new EnrolmentsController;

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

			// if not old and is not manager, filter to only ten day courses 
			if (!$is_old && AuthComponent::user('permission') != 'manager') {
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
					),
					'order' => array(
						'Course.name' => 'DESC'
					),
					'limit' => 10
				);
				$this->Paginator->settings = $options;
                //if user is old but not the manager, filter any day courses
			} else if ($is_old && AuthComponent::user('permission') != 'manager') {
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
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Flash->success(__('The course has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The course could not be saved. Please, try again.'));
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
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Course->save($this->request->data)) {
				$this->Flash->success(__('The course has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The course could not be saved. Please, try again.'));
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
		$query = $this->Enrolments->id->find('all', array('conditions' => array("Course.id" => $this->params['named']['course_id'])));

		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {

			foreach($query as $id) {
				// Call a method from
				$Enrolments->delete($id)
			}

			$this->Flash->success(__('The course has been deleted.'));
		} else {
			$this->Flash->error(__('The course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
