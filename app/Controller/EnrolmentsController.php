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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enrolment->recursive = 0;
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
		$this->set('enrolment', $this->Enrolment->find('list', $options));
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
		$students = $this->Enrolment->Student->find('list');
		$courses = $this->Enrolment->Course->find('list');
		$this->set(compact('students', 'courses'));
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
		$students = $this->Enrolment->Student->find('list');
		$courses = $this->Enrolment->Course->find('list');
		$this->set(compact('students', 'courses'));
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
