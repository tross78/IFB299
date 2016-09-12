<?php
App::uses('AppController', 'Controller');
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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Course->recursive = 0;

		$current_date = date('Y-m-d');
		$old_compare = $this->Course->Enrolment->find('count', array(
				'conditions' => array(
					'DATE(enrolment_date) < ' => $current_date,
					'user_id' => AuthComponent::user('id')
				))
				) > 0;

		$this->set('courses', $this->Paginator->paginate());

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
	public function delete($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {
			$this->Flash->success(__('The course has been deleted.'));
		} else {
			$this->Flash->error(__('The course could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
