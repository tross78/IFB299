<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset class="form-group">
		<legend><?php echo __('Edit Course'); ?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('name', array('class' => 'form-control', 'div' => 'form-group'));
		echo $this->Form->input('description', array('class' => 'form-control', 'div' => 'form-group'));
		$days_options = array('three' => 'three&nbsp;&nbsp;', 'ten' => 'ten&nbsp;&nbsp;', 'thirty' => 'thirty');
		$days_attributes = array(
			'legend' => false,
			'type' => 'radio',
			'before' => '<label class="control-label">Days</label>',
			'options' => $days_options,
			'class' => false,
			'value' => 'three'
		);
		echo $this->Form->input('days', $days_attributes);
	?>
		<?php
		echo $this->Form->hidden('id');
		$gender_options = array('male' => 'male&nbsp;&nbsp;', 'female&nbpsp;&nbsp;&nbsp;' => 'female', 'mixed' => 'mixed');
		$gender_attributes = array(
			'legend' => false,
			'type' => 'radio',
			'before' => '<label class="control-label">Gender</label>',
			'options' => $gender_options,
			'class' => false,
			'value' => 'male'
		);
		echo $this->Form->input('gender', $gender_attributes)
		?>

	<?php echo $this->Form->input('start_date', array(
        'class' => 'form-control',
        'placeholder' => 'Start Date',
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'
    ));?>
	<?php echo $this->Form->input('end_date', array(
       'class' => 'form-control',
        'placeholder' => 'End Date',
		'between' => '<div class="form-inline form-group">',
        'after' => '</div>'
    ));?>
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
	<div class="panel-body">
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Course.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Course.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
