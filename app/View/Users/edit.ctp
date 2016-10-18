<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('username', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('first_name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('last_name', array('class' => 'form-control', 'div' => 'form-group'));
	?>
			<label for="UserDateOfBirth">Date of Birth</label>
			<div class="form-group">
			<div data-component="HawkeDatePicker" value="<?php echo $this->User['User']['date_of_birth'] ?>">
				<div data-reactroot="" class="react-flex react-date-field react-date-field--theme-default react-date-field--picker-position-bottom react-flex-v2--align-items-center react-flex-v2--row react-flex-v2--display-inline-flex">
					<?php echo $this->Form->input('date_of_birth', array('type' => 'text', 'value' => $this->User['User']['date_of_birth'])); ?>
					<div class="react-date-field__calendar-icon">
						<div class="react-date-field__calendar-icon-inner"></div>
					</div>
				</div>
			</div>
			</div>
	<?php
		$gender_options = array('male' => 'male&nbsp;&nbsp;','female' => 'female');
		$gender_attributes = array(
			'legend' => false,
			'type' => 'radio',
			'before' => '<label class="control-label">Gender</label>',
			'options' => $gender_options,
			'class' => false,
			'value' => 'male'
		);
		echo $this->Form->input('gender', $gender_attributes);
		echo $this->Form->input('email_address', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('residential_address', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('dietary_requirements', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('medical_requirements', array('class' => 'form-control', 'div' => 'form-group'));
		$permission_options = array('student' => 'student&nbsp;&nbsp;','server' => 'server&nbsp;&nbsp;','manager' => 'manager&nbsp;&nbsp;','terminated' => 'terminated',);
		$permission_attributes = array(
			'legend' => false,
			'type' => 'radio',
			'before' => '<label class="control-label">Permissions</label>',
			'options' => $permission_options,
			'class' => false,
			'value' => 'student'
		);
		// only managers can elevate permissions
		// Would like to make it that managers can't edit other managers but not really a priority.
		if (AuthComponent::user('permission') == 'manager') {
			echo $this->Form->input('permission', $permission_attributes);
		}
	?>
	</fieldset>
	<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
	?>
</div>