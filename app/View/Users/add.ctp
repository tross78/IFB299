<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('username', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('password', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('first_name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('last_name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('date_of_birth', array(
			'label' => 'Date of birth', 
			'dateFormat' => 'DMY',
			'minYear' => date('Y') - 70,
			'maxYear' => date('Y') - 18,
			'class' => 'form-control',
			'div' => 'form-group',
			'placeholder' => 'Date of Birth',
			'between' => '<div class="form-inline form-group">',
			'after' => '</div>'));
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