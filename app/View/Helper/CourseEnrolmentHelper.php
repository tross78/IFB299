<?php
App::uses('AppHelper', 'View/Helper');

class CourseEnrolmentHelper extends AppHelper { 

   public function getEnrolments($course_id) { 
        App::import('Model', 'Enrolment'); 
        $this->Enrolment = new Enrolment; 
        $output = $this->Enrolment->find('all', array(
                'fields' => array('Enrolment.id', 'Enrolment.course_id', 'User.id', 'User.full_name'),
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