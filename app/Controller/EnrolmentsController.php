<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
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
		// filter on course name, user name, user role
		$this->set('enrolments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $course_id = null, $user_id = null) {
		if (!$this->Enrolment->exists($id)) {
			throw new NotFoundException(__('Invalid enrolment'));
		}
		$options = array('conditions' => array('Enrolment.' . $this->Enrolment->primaryKey => $id));
		$options1 = array('conditions' => array('Course.' . $this->Enrolment->Course->primaryKey => $course_id));
		$options2 = array('conditions' => array('User.' . $this->Enrolment->User->primaryKey => $user_id));

		$this->set('enrolment', $this->Enrolment->find('first', $options));
		$this->set('course', $this->Enrolment->Course->find('first', $options1));
		$this->set('user', $this->Enrolment->User->find('first', $options2));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//HG: student cap is now set through creating a course
		$test = $this->Enrolment->Course->find('first', array(
		    'field' => array('Course.capacity'),
		    'contain' => array('Enrolment'),
            'conditions' => array(
                'Course.id' => $this->params['named']['course_id']
            )
        ));
				$studentCap = $test['Course']['capacity'];

		$kitchenCap = 1; //set to 1 for testing purposes to test '$kitchen_full', normal student capacity will be 5.
		$teacherCap = 1; //normal assistant-teacher capacity is 1.
		$managerCap = 1; //normal manager capacity is 1.

		//AG: this sets the capacity of the waitlist for students when the sudent capacity has been met. Only students get a waitlisted.
		$waitCap = 1;	//set to 1 for testing purposes to test '$wait_full', normal waitlist capacity will be 7.

		//AG: Grabs the gender of the user currently logged in.
		$user_gender = AuthComponent::user('gender');

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
						'Enrolment.waitlist' => 'yes',
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
		$this->set("is_male", $is_male);
		$this->set("is_female", $is_female);
		$this->set("course_full", $course_full);
		$this->set("wait_full", $wait_full);
		$this->set("manager_full", $manager_full);
		$this->set("teacher_full", $teacher_full);
		$this->set("kitchen_full", $kitchen_full);
		$this->set("studentCap", $studentCap);

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

		//AG: Checks class selections
		$one = $this->request->data['Enrolment']['class_one'];
		$two = $this->request->data['Enrolment']['class_two'];
		$three = $this->request->data['Enrolment']['class_three'];

		//Ag: Manually set enrolment date to current date
		$this->request->data['Enrolment']['enrolment_date'] = date('Y-m-d');

		//Ag: Manually set classes if manager or kitchen helper
		if ($is_manager||$is_kitchen){
			$this->request->data['Enrolment']['class_one'] = "n/a";
			$this->request->data['Enrolment']['class_two'] = "n/a";
			$this->request->data['Enrolment']['class_three'] = "n/a";
		}

		//AG: Code to set waitlist to yes if course is full.
		if ($course_full && $is_student) {
			$this->request->data['Enrolment']['waitlist'] = 'yes';
		}else{
			$this->request->data['Enrolment']['waitlist'] = 'no';
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
			} elseif (($is_student || $is_teacher)&&($one == $two || $one == $three || $two == $three)){
					$this->Flash->error(__('Class selections must be unique.'));
			} elseif (($is_student || $is_teacher)&&($one == 'empty' || $two == 'empty' || $three == 'empty')){
					$this->Flash->error(__('You must make a Valid class selection for EACH time slot.'));
			} else {
				$this->Enrolment->create();
				if ($this->Enrolment->save($this->request->data)) {
					$this->Flash->success(__('The enrolment has been saved.'));
					if(!$course_full) {
						if ($user_gender == 'male' && $is_student) {
							$this->Enrolment->Course->updateAll(array('enrolments_male' => 'enrolments_male+1'), array('Course.id' => $this->params['named']['course_id']));  //might move these into their own method later on
							$this->Enrolment->Course->updateAll(array('enrolments' => 'enrolments+1'), array('Course.id' => $this->params['named']['course_id']));
						} elseif ($user_gender == 'female' && $is_student){
							$this->Enrolment->Course->updateAll(array('enrolments_female' => 'enrolments_female+1'), array('Course.id' => $this->params['named']['course_id']));
							$this->Enrolment->Course->updateAll(array('enrolments' => 'enrolments+1'), array('Course.id' => $this->params['named']['course_id']));
						}
					} else {
						echo "DO NOTHING";
					}
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
		if (($old_compare) && (AuthComponent::user('permission') == "student")) {
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

			//AG: Grabs the cuurrent enrolment for user_id manual set.
			$Uid = $this->Enrolment->find('first', array(
					'field' => array('Enrolment.id', 'Enrolment.user_id'),
					'conditions' => array(
						"Enrolment.id" => $id
					))
			);

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

			//AG: Checks class selections
			$one = $this->request->data['Enrolment']['class_one'];
			$two = $this->request->data['Enrolment']['class_two'];
			$three = $this->request->data['Enrolment']['class_three'];

			//Ag: Manually set enrolment date to current date
			$this->request->data['Enrolment']['enrolment_date'] = date('Y-m-d');

			//Ag: Manually set user name so managers can edit other users without overwriting
			$this->request->data['Enrolment']['user_id'] = $Uid['Enrolment']['user_id'];

			//Ag: Manually set classes if manager or kitchen helper
			if ($is_manager||$is_kitchen){
			$this->request->data['Enrolment']['class_one'] = "n/a";
			$this->request->data['Enrolment']['class_two'] = "n/a";
			$this->request->data['Enrolment']['class_three'] = "n/a";
			}

			if (($is_student || $is_teacher)&&($one == $two || $one == $three || $two == $three)){
					$this->Flash->error(__('Class selections must be unique.'));
			} elseif (($is_student || $is_teacher)&&($one == 'empty' || $two == 'empty' || $three == 'empty')){
					$this->Flash->error(__('You must make a Valid class selection for EACH time slot.'));
			} else {
				if ($this->Enrolment->save($this->request->data)) {
					$this->Flash->success(__('The enrolment has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('Enrolment.' . $this->Enrolment->primaryKey => $id));
			$this->request->data = $this->Enrolment->find('first', $options);
		}
		$users = $this->Enrolment->User->find('list');
		$courses = $this->Enrolment->Course->find('list');
		//TR: Added var for fixed course on edit view

		$current_enrolled_course = $this->Enrolment->Course->find('first', array(
					'fields' => array('Course.id', 'Course.name'),
					'contain' => array('Enrolment'),
					'conditions' => array(
						"Course.id" =>  $this->request->data['Enrolment']['course_id']
					)));
		$this->set(compact('users', 'courses', 'current_enrolled_course'));
	}


	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
		public function delete($id = null) {
					$is_student = $this->request->data['Enrolment']['role'] == 'student';
            $this->Enrolment->id = $id;
            if (!$this->Enrolment->exists()) {
                throw new NotFoundException(__('Invalid enrolment'));
            }


            $this->request->allowMethod('post', 'delete');
            $user_gender = AuthComponent::user('gender');

            //HG find the courseID that we are deleting the user from
            $courseId = $this->Enrolment->find('first', array(
                'field' => array('Enrolment.course_id'),
                'conditions' => array(
                    'Enrolment.id' => $id
                )
            ));
            $deletedId = $courseId['Enrolment']['course_id'];

            //AG: to check if the number of students on the waitlist for this course has reached the waitlist capacity.
            $wait_full = $this->Enrolment->find('count', array(
                        'fields' => array('Course.id'),
                        'contain' => array('Course'),
                        'conditions' => array(
                            'Enrolment.waitlist' => 'yes',
                            'Course.id' => $deletedId
                        ))
                ) >= 1;

            if ($this->Enrolment->delete()) {
                if ($wait_full) {

                    $inWaitlist = $this->Enrolment->find('first', array(
                        'contains' => array('Enrolment'),
                        'conditions' => array(
                            'Enrolment.waitlist' => 'yes'
                        )
                    ));

                    if ($inWaitlist) {
                        $longest = $inWaitlist['Enrolment']['user_id'];

                        $userIDS = $this->Enrolment->find('all', array(
                            'field' => array('Enrolment.user_id','User.email_address', 'User.first_name', 'Course.name'),
                            'contain' => array('User', 'Course'),
                            'conditions' => array(
                                'course_id' => $deletedId,
                                'user_id' => $longest
                            )));
                        $this->Enrolment->id = $this->Enrolment->field('id', array('course_id' => $deletedId, 'user_id' => $longest));
                        if ($this->Enrolment->id) {
                            $this->Enrolment->saveField('waitlist', 'no');
                            foreach ($userIDS as $userID) {
                                //send email
                                $Email = new CakeEmail('gmail');
                                $Email->returnPath('teamhawkemeditation@gmail.com');
                                $Email->sender('teamhawkemeditation@gmail.com', 'Hawke Meditation Centre');
                                $Email->from(array('teamhawkemeditation@gmail.com' => 'Hawke Meditation Centre'));
                                $Email->to($userID['User']['email_address']);
                                $Email->subject('You have been auto enrolled from the waitlist!');
                                $Email->send('Hello ' . $userID['User']['first_name'] . ',' . "\n\n" . 'you have been successfully enrolled into ' . $userID['Course']['name'] . ' from the waitlist!.' . "\n\n" . 'Thank you and we hope to see you soon!' . "\n\n" . '- The Hawke Centre Team');
                                $this->Flash->success(__($userID['User']['email_address']));
                            }
                        }
                    }
                }
                if ($user_gender == 'male'/* && $is_student*/) {
                    $this->Enrolment->Course->updateAll(array('enrolments_male' => 'enrolments_male-1'), array('Course.id' => $deletedId));  //might move these into their own method later on
                    $this->Enrolment->Course->updateAll(array('enrolments' => 'enrolments-1'), array('Course.id' => $deletedId));
                } elseif ($user_gender == 'female'/* && $is_student*/) {
                    $this->Enrolment->Course->updateAll(array('enrolments_female' => 'enrolments_female-1'), array('Course.id' => $deletedId));
                    $this->Enrolment->Course->updateAll(array('enrolments' => 'enrolments-1'), array('Course.id' => $deletedId));
                }

                $this->Flash->success(__('The enrolment has been deleted.'));
            } else {
                $this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
		}

}
