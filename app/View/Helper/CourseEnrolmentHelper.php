<?php
App::uses('AppHelper', 'View/Helper');

class CourseEnrolmentHelper extends AppHelper { 

   public function getEnrolments($course_id) { 
        App::import('Model', 'Enrolment'); 
        $this->Enrolment = new Enrolment; 
        $output = $this->Enrolment->find('all', array(
                'fields' => array('Enrolment.id', 'Enrolment.user_id', 'Enrolment.course_id', 'User.id', 'User.first_name', 'User.last_name', 'User.dietary_requirements', 'User.medical_requirements'),
				'contain' => array('User'),
				'conditions' => array(
					"course_id" => $course_id,
				)
			));
        // create output.... 
        return $output; 
   } 

} 

?>