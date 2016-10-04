<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('username', array('class' => 'form-control', 'div' => 'form-group'));
		// echo $this->Form->input('password', array('data-component' => 'ReactPasswordStrength', 'class' => 'form-control', 'div' => 'form-group'));
	?>
	<label for="UserPassword">Password</label>
	<div class="form-group">
	<div data-component="HawkePasswordStrength">
		<div data-reactroot="" class="ReactPasswordStrength">
			<input type="password" class="ReactPasswordStrength-input" value="">
			<div class="ReactPasswordStrength-strength-bar"></div>
			<span class="ReactPasswordStrength-strength-desc"></span>
		</div>
	</div>
	</div>
<?php
		echo $this->Form->input('first_name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('last_name', array('class' => 'form-control', 'div' => 'form-group'));
		?>
			<label for="UserDateOfBirth">Date of Birth</label>
			<div class="form-group">
			<div data-component="HawkeDatePicker">
				<div data-reactroot="" class="react-flex react-date-field react-date-field--theme-default react-date-field--picker-position-bottom react-flex-v2--align-items-center react-flex-v2--row react-flex-v2--display-inline-flex">
					<?php echo $this->Form->input('date_of_birth', array('type' => 'text')); ?>
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
		echo $this->Form->input('tos', array('type'=>'checkbox', 'label'=>__('I confirm I have read the <a href="/tos">Terms of Service</a>.', true), 'hiddenField' => false, 'value' => '0'));
	?>
	</fieldset>
	<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
	?>
</div>