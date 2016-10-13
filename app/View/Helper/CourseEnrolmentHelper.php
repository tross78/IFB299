<?php
App::uses('AppHelper', 'View/Helper');

class CourseEnrolmentHelper extends AppHelper { 

   public function getEnrolments($course_id) { 
        App::import('Model', 'Enrolment'); 
        $this->Enrolment = new Enrolment; 
        $this->data = $this->Enrolment->find('all', array(
				'conditions' => array(
					"course_id" => $course_id,
				)
			));
        // create output.... 
        return $this->data; 
   } 

} 

?>