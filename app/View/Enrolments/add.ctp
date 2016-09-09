<div class="enrolments form">
<?php echo $this->Form->create('Enrolment'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Add Enrolment'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('user_id', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('course_id', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('enrolment_date', array(
        'class' => 'form-control',
        'placeholder' => 'Enrolment Date',
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));
		$role_options = array('student' => 'student','assistant-teacher' => 'assistant-teacher', 'kitchen-helper' => 'kitchen-helper', 'manager' => 'manager', 'class' => 'form-control', 'div' => 'form-group');
		echo $this->Form->input('role', array("options"=>$role_options));
	?>
	</fieldset>
	<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
	?>
</div>
<div class="actions panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Actions'); ?></h3></div>
	<ul>

		<li><?php echo $this->Html->link(__('List Enrolments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
