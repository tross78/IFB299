<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('password', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('first_name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('last_name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('date_of_birth', array(
        'class' => 'form-control',
        'placeholder' => 'Date of Birth',
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'));
		$gender_options = array('male' => 'male','female' => 'female');
		$gender_attributes = array(
			'legend' => false,
			'type' => 'radio',
			'before' => '<label class="col col-md-3 control-label">Radio</label>',
			'options' => $gender_options,
			'class' => false,
			'value' => 'male'
		);
		echo $this->Form->input('gender', $gender_attributes);
		echo $this->Form->input('email_address', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('residential_address', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('dietary_requirements', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('medical_requirements', array('class' => 'form-control', 'div' => 'form-group'));
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

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>