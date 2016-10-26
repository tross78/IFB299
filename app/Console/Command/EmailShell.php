<?php
App::uses('Shell', 'Console');
App::uses('CakeEmail', 'Network/Email');

class EmailShell extends AppShell {
    public function main() {
      $current_date_plus_ten = date('Y-m-d', strtotime('+10 days'));

      // $course_id = $this->query("SELECT id FROM courses WHERE start_date = $current_date_plus_ten");
      // $user_ids = $this->query("SELECT id FROM enrolments WHERE course_id = $course_id");
      // $user_emails = $this->query("SELECT email_address FROM users WHERE")


      $userIDS = $this->Course->Enrolment->find('all', array(
        'field' => array('Enrolment.user_id','Enrolment.course_id','User.email_address', 'Course.start_date'),
        'contain' => array('User', 'Course'),
        'conditions' => array(
          'start_date' => $current_date_plus_ten)));

      foreach ($userIDS as $userID) {
        $Email = new CakeEmail('gmail');
        $Email->returnPath('teamhawkemeditation@gmail.com');
        $Email->sender('teamhawkemeditation@gmail.com', 'Hawke Meditation Centre');
        $Email->from(array('teamhawkemeditation@gmail.com' => 'Hawke Meditation Centre'));
        $Email->to($userID['User']['email_address']);
        $Email->subject('Your course begins soon!');
        $Email->send('Hello ' . $userID['User']['first_name'] . ',' . "\n\n" . 'Sending a friendly reminder that your Meditation course begins in 10 days time on the ' . $userID['Course']['start_date'] . '.' . ' Due to a tendency in courses reaching full capacity, we require a response within 2 days time from having sent this email. Unfortunately if we don\'t receive a confirmation email you\'re spot in this course will be cancelled.' . "\n\n" . 'Thank you and we hope to see you soon!' . "\n\n" . '- The Hawke Centre Team');
      }
    }

}
?>
