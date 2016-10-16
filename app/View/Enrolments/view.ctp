<div class="enrolments view">
<h2><?php echo __('Enrolment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['id']); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrolment['User']['full_name'], array('controller' => 'users', 'action' => 'view', $enrolment['User']['id'])); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($enrolment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enrolment['Course']['id'])); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('9am Class'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['class_one']); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('12pm Class'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['class_two']); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('3pm Class'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['class_three']); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('Enrolment Date'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['enrolment_date']); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['role']); ?>
			&nbsp;&nbsp;
		</dd>
		<dt><?php echo __('Waitlist Position'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['waitlist']); ?>
			&nbsp;&nbsp;
		</dd>
	</dl>
</div>