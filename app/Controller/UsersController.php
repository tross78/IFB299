<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
    	$this->Auth->allow('add', 'logout');
		$this->Auth->deny('index');
	}

	public function emailWelcomeMessage() {
		$Email = new CakeEmail('gmail');
		$Email->sender('admin@team-hawk.herokuapp.com', 'Hawke Meditation Centre');
		$Email->from(array('admin@team-hawk.herokuapp.com' => 'Hawke Meditation Centre'));
		$Email->returnPath('admin@team-hawk.herokuapp.com');
		$Email->sender('teamhawkemeditation@gmail.com', 'Hawke Meditation Centre');
		$Email->from(array('teamhawkemeditation@gmail.com' => 'Hawke Meditation Centre'));
		$Email->to($this->request->data['User']['email_address']);
		$Email->subject('Welcome to Hawke Meditation Centre!');
		$Email->send('Hello '. $this->request->data['User']['first_name']. ',' . "\n\n". 'On behalf of the team here at the Hawke Meditation Centre, welcome and thanks for signing up! Now that you have signed up feel free to register for one of our 10 day Introductory courses or contact us with any questions you have.' . "\n\n" . 'We hope to see you soon!' . "\n\n" .'- The Hawke Centre Team');
	}


	public function isAuthorized($user) {
		// All registered users can add users
		if ($this->action === 'add') {
			return true;
		}

		if (in_array($this->action, array('edit', 'delete'))) {
			if ($user['id'] == $this->Auth->user('id') || $user['permission'] == 'manager') {
				return true;
			} else {
				return false;
			}

		}

		if (in_array($this->action, array('index'))) {
			if ($user['permission'] == 'manager') {
				return true;
			} else {
				return false;
			}

		}

		return parent::isAuthorized($user);
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$permision_check = AuthComponent::user('permission');

				if ($permision_check == 'terminated'){
					$this->Flash->error(__('This account has been terminated by a manager. You will not be able to login.'));
					$this->Auth->logout();
					return $this->redirect($this->referer());
				}
				else {
					return $this->redirect($this->Auth->redirectUrl());
				}
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		
		$this->set('user', $this->User->find('first', $options));

		$this->set('enrolments', $this->User->Enrolment->find('all', array(
			'fields' => array('Enrolment.id', 'Course.id', 'Course.name', 'Enrolment.user_id', 'Enrolment.course_id', 'User.id'),
			'contain' => array('Course', 'User'),
			'conditions' => array(
				'user_id' => $id
			))
		));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data = $this->User->formatDOB($this->request->data);
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				$this->emailWelcomeMessage();
				return $this->redirect(array('action' => 'index'));
			} else {

				$this->Flash->error(__('The user could not be saved. Please, try again.'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->data = $this->User->formatDOB($this->request->data);
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
