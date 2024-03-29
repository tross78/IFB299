<div class="enrolments index">
<div class="panel panel-primary">
<div class="panel-heading">
    <h2 class="panel-title"><?php echo __('Enrolments'); ?></h2>
  </div>
   <div class="panel-body">
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('User.gender'); ?></th>
			<th><?php echo $this->Paginator->sort('enrolment_date');?></th>
			<th><?php echo $this->Paginator->sort('role'); ?></th>
			<th><?php echo $this->Paginator->sort('waitlist'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($enrolments as $enrolment): ?>
	<tr>
		<?php
			if (AuthComponent::user('permission') == 'manager' || AuthComponent::user('id') == $enrolment['User']['id']):?>
			<td>
				<?php echo $this->Html->link($enrolment['Course']['name'], array('controller' => 'courses', 'action' => 'view', $enrolment['Course']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($enrolment['User']['full_name'], array('controller' => 'users', 'action' => 'view', $enrolment['User']['id'])); ?>
			</td>
			<td><?php echo h($enrolment['User']['gender']); ?>&nbsp;</td>
			<td><?php echo h($enrolment['Enrolment']['enrolment_date']); ?>&nbsp;</td>
			<td><?php echo h($enrolment['Enrolment']['role']); ?>&nbsp;</td>
			<td><?php echo h($enrolment['Enrolment']['waitlist']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $enrolment['Enrolment']['id'], $enrolment['Enrolment']['course_id'], $enrolment['Enrolment']['user_id'])); ?>
				<?php //if (AuthComponent::user('permission') == 'manager'):?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $enrolment['Enrolment']['id'])); ?>
				<?php //endif; ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $enrolment['Enrolment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $enrolment['Enrolment']['id']))); ?>
			</td>
		<?php endif; ?>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
		<?php
		if ($this->Paginator->hasPage(2)):
		?>
		<p class="small">
		<?php
			echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count}')
			));
		?>	</p>
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
		</ul>
	<?php endif; ?>
	</div>
	</div>
</div>
