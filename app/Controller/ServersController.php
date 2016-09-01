<?php
App::uses('AppController', 'Controller');
/**
 * Servers Controller
 *
 * @property Server $Server
 * @property PaginatorComponent $Paginator
 */
class ServersController extends AppController {

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
		$this->Server->recursive = 0;
		$this->set('servers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Server->exists($id)) {
			throw new NotFoundException(__('Invalid server'));
		}
		$options = array('conditions' => array('Server.' . $this->Server->primaryKey => $id));
		$this->set('server', $this->Server->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Server->create();
			if ($this->Server->save($this->request->data)) {
				$this->Flash->success(__('The server has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The server could not be saved. Please, try again.'));
			}
		}
		$students = $this->Server->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Server->exists($id)) {
			throw new NotFoundException(__('Invalid server'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Server->save($this->request->data)) {
				$this->Flash->success(__('The server has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The server could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Server.' . $this->Server->primaryKey => $id));
			$this->request->data = $this->Server->find('first', $options);
		}
		$students = $this->Server->Student->find('list');
		$this->set(compact('students'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Server->id = $id;
		if (!$this->Server->exists()) {
			throw new NotFoundException(__('Invalid server'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Server->delete()) {
			$this->Flash->success(__('The server has been deleted.'));
		} else {
			$this->Flash->error(__('The server could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
