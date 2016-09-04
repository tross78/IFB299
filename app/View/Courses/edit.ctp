<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Edit Course'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('description', array('class' => 'form-control'));
	?>

	<div class="form-group">
		<?php echo $this->Form->input('start_date', array(
			'class' => 'form-control',
			'placeholder' => 'Start Date',
			'between' => '<div class="form-group">',
			'separator' => '</div><div class="form-group">',
			'after' => '</div>'
		));?>
	</div>

	<div class="form-group">
		<?php echo $this->Form->input('end_date', array(
			'class' => 'form-control',
			'placeholder' => 'End Date',
			'div' => array('class' => 'form-inline'),
			'between' => '<div class="form-group">',
			'separator' => '</div><div class="form-group">',
			'after' => '</div>'
		));?>
	</div>
	</fieldset>
	<?php echo $this->Form->submit('Submit', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
	?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Course.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
