<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Add Course'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('description', array('class' => 'form-control'));
	?>
	<div class="col-xs-2">
	<?php
		echo $this->Form->input('start_date', array('class' => 'form-control'));
	?>
	</div>
	<div class="col-xs-2">
	<?php
		echo $this->Form->input('end_date', array('class' => 'form-control'));
	?>
	</div>
	</fieldset>
	<?php
		$options = array(
			'label' => 'Submit',
			'div' => array(
				'class' => 'btn btn-primary',
			)
		);
	echo $this->Form->end($options);
	?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
