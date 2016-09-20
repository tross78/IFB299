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
			<legend><?php echo __('Add Enrolment'); ?></legend>
		<?php
			}
		?>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('user_id', array('value'=>$authUser['id']));
		echo $this->Form->input('course_id', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('enrolment_date', array(
        'class' => 'form-control',
        'placeholder' => 'Enrolment Date',
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));
		
		if ($is_old) {
			$role_options = array('student' => 'student','assistant-teacher' => 'assistant-teacher', 'kitchen-helper' => 'kitchen-helper', 'manager' => 'manager');
		} else{
			$role_options = array('student' => 'student');
		}
		
		echo $this->Form->input('role', array(
        'class' => 'form-control',
        'placeholder' => 'Role',
		'options' => $role_options,
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