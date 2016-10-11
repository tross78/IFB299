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
			//AG: course length in days
			$cdays = $this->request->data['Course']['days'];
			
			//AG: course start date to be incremented below depending on course length
			$sdate = new DateTime(implode('-', array(
					$this->request->data['Course']['start_date']['year'],
					$this->request->data['Course']['start_date']['month'],
					$this->request->data['Course']['start_date']['day']
					)));
			
			//Ag: Manually set end date to correct date depending on length
			if ($cdays == "three"){
				$sdate->add(new DateInterval('P3D'));
			}else if ($cdays == "ten"){
				$sdate->add(new DateInterval('P10D'));
			}else{
				$sdate->add(new DateInterval('P30D'));	
			}
			
			//AG: updates new end date.
			$this->request->data['Course']['end_date'] = $sdate->format('Y-m-d');
			
			
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
		/*$query = $this->Course->Enrolments->find('all', array('conditions' => array("Course.id" => $this->params['named']['course_id'])));
        $current_date = date('Y-m-d');*/

		$this->Course->id = $id;

        //HG: check if the course has already commenced
        //dosen't work yet!

/*        $course_started = $this->Course->Enrolment->find('count', array(
            'fields' => array('Course.id', 'Course.start_date', 'Course.end_date'),
            'contain' => array('Course'),
            'conditions' => array(
                'DATE(Course.start_date) <' => $current_date,
                'DATE(Course.end_date) >' => $current_date,
                'Course.id' => $this->params['named']['course_id']
            )
        )) > 0;
        //HG: set
        $this->set("course_started", $course_started);*/

/*        if($course_started) {
            throw new CourseStartedException(__('Course already started'));
        }
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}*/
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {

			$this->Course->Enrolment->deleteAll(array('Enrolment.course_id' => $id, false, false));

			$this->Flash->success(__('The course has been deleted.'));
		} else {
			$this->Flash->error(__('The course could not be deleted. Please, try again.'));
		}
        $this->Flash->success(__($course_started));
		return $this->redirect(array('action' => 'index'));
	}
}
