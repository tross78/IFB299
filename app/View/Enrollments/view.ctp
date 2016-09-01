<div class="enrollments view">
<h2><?php echo __('Enrollment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Student']['id'], array('controller' => 'students', 'action' => 'view', $enrollment['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrollment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enrollment['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enrollment Date'); ?></dt>
		<dd>
			<?php echo h($enrollment['Enrollment']['enrollment_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enrollment'), array('action' => 'edit', $enrollment['Enrollment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enrollment'), array('action' => 'delete', $enrollment['Enrollment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $enrollment['Enrollment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrollments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrollment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
