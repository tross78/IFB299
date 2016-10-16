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
		
		if (AuthComponent::user('permission') == 'manager') {
			$role_options = array('student' => 'student','assistant-teacher' => 'assistant-teacher', 'kitchen-helper' => 'kitchen-helper', 'manager' => 'manager');
		} elseif($is_old || (AuthComponent::user('permission') == "server")){
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
		
		$class_options = array('relaxation' => 'Relaxation','tai-chi' => 'Tai Chi', 'yin-deep-stretch' => 'Yin Deep Stretch', 'mindfulness-101' => 'Mindfulness 101', 'zen-mediation' => 'Zen Mediation');

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