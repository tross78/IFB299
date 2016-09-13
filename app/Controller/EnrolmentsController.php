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
		if ($this->request->is('post')) {
			$this->Enrolment->create();
			if ($this->Enrolment->save($this->request->data)) {
				$this->Flash->success(__('The enrolment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
			}
		}
		$users = $this->Enrolment->User->find('list');

		//select * from enrolments where enrolment_date < {current date}
		$current_date = date('Y-m-d');
		$old_compare = $this->Enrolment->find('count', array(
				'conditions' => array(
					'DATE(enrolment_date) < ' => $current_date,
					'user_id' => AuthComponent::user('id'),
					'Course.days' => 'ten'
				))
				) > 0;
		$this->set('is_old', $old_compare);
		
		if (isset($this->params['named']['course_id'])) {
			$courses = $this->Enrolment->Course->find('list', array(
				'conditions' => array(
					"Course.id" => $this->params['named']['course_id']
				)
			));
		} else {
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
