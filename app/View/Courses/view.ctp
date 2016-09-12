<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($course['Course']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Days'); ?></dt>
		<dd>
			<?php echo h($course['Course']['days']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($course['Course']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($course['Course']['end_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Actions'); ?></h3></div>
	<div class="panel-body">
		<ul>
			<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $course['Course']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?php echo __('Related Enrolments'); ?></h3></div>
	<div class="panel-body">
		<?php if (!empty($course['Enrolment'])): ?>
		<table class="table">
		<tr>
			<th><?php echo __('Id'); ?></th>
			<th><?php echo __('User Id'); ?></th>
			<th><?php echo __('Course Id'); ?></th>
			<th><?php echo __('Enrolment Date'); ?></th>
			<th><?php echo __('Role'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($course['Enrolment'] as $enrolment): ?>
			<tr>
				<td><?php echo $enrolment['id']; ?></td>
				<td><?php echo $enrolment['user_id']; ?></td>
				<td><?php echo $enrolment['course_id']; ?></td>
				<td><?php echo $enrolment['enrolment_date']; ?></td>
				<td><?php echo $enrolment['role']; ?></td>
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
</div>
