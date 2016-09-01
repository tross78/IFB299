<?php
App::uses('AppController', 'Controller');
/**
 * Enrollments Controller
 *
 * @property Enrollment $Enrollment
 * @property PaginatorComponent $Paginator
 */
class EnrollmentsController extends AppController {

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
		$this->Enrollment->recursive = 0;
		$this->set('enrollments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
		$this->set('enrollment', $this->Enrollment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enrollment->create();
			if ($this->Enrollment->save($this->request->data)) {
				$this->Flash->success(__('The enrollment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enrollment could not be saved. Please, try again.'));
			}
		}
		$students = $this->Enrollment->Student->find('list');
		$courses = $this->Enrollment->Course->find('list');
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
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enrollment->save($this->request->data)) {
				$this->Flash->success(__('The enrollment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enrollment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
			$this->request->data = $this->Enrollment->find('first', $options);
		}
		$students = $this->Enrollment->Student->find('list');
		$courses = $this->Enrollment->Course->find('list');
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
		$this->Enrollment->id = $id;
		if (!$this->Enrollment->exists()) {
			throw new NotFoundException(__('Invalid enrollment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enrollment->delete()) {
			$this->Flash->success(__('The enrollment has been deleted.'));
		} else {
			$this->Flash->error(__('The enrollment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
