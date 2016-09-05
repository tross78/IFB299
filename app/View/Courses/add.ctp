<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Add Course'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('description', array('class' => 'form-control'));
	?>

	<?php echo $this->Form->input('start_date', array(
        'class' => 'form-control',
        'placeholder' => 'Start Date',
        'div' => array('class' => 'form-inline'),
		'between' => '<div class="form-group">',
        'separator' => '</div><div class="form-group">',
        'after' => '</div></div>'
    ));?>
	<?php echo $this->Form->input('end_date', array(
       'class' => 'form-control',
        'placeholder' => 'End Date',
        'div' => array('class' => 'form-inline'),
		'between' => '<div class="form-group">',
        'separator' => '</div><div class="form-group">',
        'after' => '</div></div>'
    ));?>
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

		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
