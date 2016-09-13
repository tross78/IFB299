<div class="courses index">
	<h2><?php echo __('Courses'); ?></h2>
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('days'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('enrolments'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($courses as $course): 
	?>
	<tr>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['description']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['days']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['end_date']); ?>&nbsp;</td>
		<td>	
	<div class="progress">
		<?php 
			$enrolments_male_percent =  ($course['Course']['enrolments_male'] / 26)*100;
			 ?>
	 	 <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $enrolments_male_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $enrolments_male_percent; ?>%">
    		<?php echo (26-$course['Course']['enrolments_male']) . ' male places remaining'; ?>
		</div>
	</div>
	<div class="progress">
		<?php 
			$enrolments_female_percent = ($course['Course']['enrolments_female'] / 26)*100;
			 ?>
		<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $enrolments_female_percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $enrolments_female_percent; ?>%">
			<?php echo (26-$course['Course']['enrolments_female']) . ' female places remaining'; ?>
		</div>
	</div>
	</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Enrol'), array('controller' => 'enrolments', 'action' => 'add', 'course_id' => $course['Course']['id'])); ?>
			<?php 
				if (AuthComponent::user('permission') == 'manager') {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $course['Course']['id']))); 
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
	<?php 
		if (AuthComponent::user('permission') == 'manager') {
			echo $this->Html->link(
				$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-plus')) . " Add Course",
				array('action' => 'add'),
				array('class' => 'btn btn-primary', 'escape' => false)
				);
		}
	?>

</div>
