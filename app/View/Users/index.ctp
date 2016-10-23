<div class="users index">
<div class="panel panel-primary">
<div class="panel-heading">
    <h2 class="panel-title"><?php echo __('Users'); ?></h2>
	</div>
   <div class="panel-body">
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('email_address'); ?></th>
			<th><?php echo $this->Paginator->sort('permission'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email_address']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['permission']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php
				if (AuthComponent::user('permission') == 'manager' || AuthComponent::user('id') == $user['User']['id']) {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); 
				}
			?>
		</td>
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
