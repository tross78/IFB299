<div class="enrolments form">
<?php echo $this->Form->create('Enrolment'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Edit Enrolment'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->hidden('user_id', array('value'=>$authUser['id']));
		echo $this->Form->input('course_id', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->hidden('enrolment_date', array(
        'class' => 'form-control',
        'placeholder' => 'Enrolment Date',
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));
		$role_options = array('student' => 'student','assistant-teacher' => 'assistant-teacher', 'kitchen-helper' => 'kitchen-helper', 'manager' => 'manager');
		echo $this->Form->input('role', array("options"=>$role_options), array('class' => 'form-control', 'div' => 'form-group'));
	?>
	</fieldset>
	<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
	?>
</div>