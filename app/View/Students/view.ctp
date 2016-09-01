<div class="students view">
<h2><?php echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($student['Student']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($student['Student']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($student['Student']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($student['Student']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($student['Student']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($student['Student']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($student['Student']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($student['Student']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($student['Student']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($student['Student']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Residential Address'); ?></dt>
		<dd>
			<?php echo h($student['Student']['residential_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($student['Course']['name'], array('controller' => 'courses', 'action' => 'view', $student['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dietary Requirements'); ?></dt>
		<dd>
			<?php echo h($student['Student']['dietary_requirements']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medical Requirements'); ?></dt>
		<dd>
			<?php echo h($student['Student']['medical_requirements']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $student['Student']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enrolments'); ?></h3>
	<?php if (!empty($student['Enrolment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Enrolment Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['Enrolment'] as $enrolment): ?>
		<tr>
			<td><?php echo $enrolment['id']; ?></td>
			<td><?php echo $enrolment['student_id']; ?></td>
			<td><?php echo $enrolment['course_id']; ?></td>
			<td><?php echo $enrolment['enrolment_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enrolments', 'action' => 'view', $enrolment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enrolments', 'action' => 'edit', $enrolment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enrolments', 'action' => 'delete', $enrolment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $enrolment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Servers'); ?></h3>
	<?php if (!empty($student['Server'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Class Assignment'); ?></th>
		<th><?php echo __('Server Role'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($student['Server'] as $server): ?>
		<tr>
			<td><?php echo $server['id']; ?></td>
			<td><?php echo $server['student_id']; ?></td>
			<td><?php echo $server['class_assignment']; ?></td>
			<td><?php echo $server['server_role']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servers', 'action' => 'view', $server['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servers', 'action' => 'edit', $server['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servers', 'action' => 'delete', $server['id']), array('confirm' => __('Are you sure you want to delete # %s?', $server['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
