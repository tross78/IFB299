<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('date_of_birth');
		$gender_options = array('male' => 'male','female' => 'female');
		$gender_attributes = array(
			'legend' => false,
			'value' => 'male'
		);
		echo $this->Form->radio('gender', $gender_options, $gender_attributes);
		echo $this->Form->input('email_address');
		echo $this->Form->input('residential_address');
		echo $this->Form->input('dietary_requirements');
		echo $this->Form->input('medical_requirements');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
