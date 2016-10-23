<div class="enrolments form">
<?php echo $this->Form->create('Enrolment'); ?>
<p>
<?php
	if ($is_old) {
		echo 'student has completed prior course';
	}
	if ($wait_full): ?>
		<div class="alert alert-danger">This course's student waitlist is full, we are no longer taking student aplications.</div>
	<?php elseif ($course_full): ?>
		<div class="alert alert-danger">The student capacity for this course has been reached, If you continue to enrol you will be waitlisted and notified via email when a placement becomes avaliable.</div>
	<?php endif;
	if ($manager_full): ?>
		<div class="alert alert-danger">The manager capacity for this course has been reached. Please choose another role.</div>
	<?php endif;
	if ($teacher_full): ?>
		<div class="alert alert-danger">The assistant-teacher capacity for this course has been reached. Please choose another role.</div>
	<?php endif;
	if ($kitchen_full): ?>
		<div class="alert alert-danger">The kitchen-helper capacity for this course has been reached. Please choose another role.</div>
	<?php endif;
?>
</p>
	<fieldset class="form-group">
		<?php
			if ($course_full) { ?>
			<legend><?php echo __('Waitlist or Server Enrolment'); ?></legend>
		<?php
			} else { ?>
			<legend><?php echo __('Confirm Role'); ?></legend>
		<?php
			}
		?>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('user_id', array('value'=>$authUser['id']));
		echo $this->Form->input('course_id', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->hidden('enrolment_date', array(
		'selected' => $course_enrolment_date,
        'class' => 'form-control',
        'placeholder' => 'Enrolment Date',
		'dateFormat' => 'DYM',
		'minYear' => date('Y'),
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));

		if (AuthComponent::user('permission') == 'manager') {
			$role_options = array('student' => 'student','assistant-teacher' => 'assistant-teacher', 'kitchen-helper' => 'kitchen-helper', 'manager' => 'manager');
		} elseif(AuthComponent::user('permission') == "server"){
			$role_options = array('student' => 'student','assistant-teacher' => 'assistant-teacher', 'kitchen-helper' => 'kitchen-helper');
		} else {
			$role_options = array('student' => 'student');
		}

		echo $this->Form->input('role', array(
        'class' => 'form-control',
        'placeholder' => 'Role',
		'options' => $role_options,
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));

		echo "<br><strong>Students and Assistant Teachers Must Select Unique Classes:</strong><br><br>";

		$class_options = array('empty' => 'Please select a class','relaxation' => 'Relaxation','tai-chi' => 'Tai Chi', 'yin-deep-stretch' => 'Yin Deep Stretch', 'mindfulness-101' => 'Mindfulness 101', 'zen-mediation' => 'Zen Mediation');

		echo $this->Form->input('class_one', array(
        'class' => 'form-control',
        'label' => '9am Class',
		'options' => $class_options,
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));

		echo $this->Form->input('class_two', array(
        'class' => 'form-control',
        'label' => '12pm Class',
		'options' => $class_options,
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));

		echo $this->Form->input('class_three', array(
        'class' => 'form-control',
        'label' => '3pm Class',
		'options' => $class_options,
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));
	?>
	</fieldset>
	<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
	?>
</div>
