<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($user['User']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['email_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Residential Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['residential_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dietary Requirements'); ?></dt>
		<dd>
			<?php echo h($user['User']['dietary_requirements']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medical Requirements'); ?></dt>
		<dd>
			<?php echo h($user['User']['medical_requirements']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permission'); ?></dt>
		<dd>
			<?php echo h($user['User']['permission']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enrolments'), array('controller' => 'enrolments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enrolment'), array('controller' => 'enrolments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enrolments'); ?></h3>
	<?php if (!empty($user['Enrolment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Enrolment Date'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Enrolment'] as $enrolment): ?>
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
