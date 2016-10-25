<div class="courses index">
<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title"><?php echo __('Courses'); ?></h2>
</div>
	<div class="panel-body">
	<table class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('days'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('enrolments'); ?></th>
			<th><?php echo $this->Paginator->sort('males'); ?></th>
			<th><?php echo $this->Paginator->sort('females'); ?></th>
			<th><?php echo $this->Paginator->sort('capacity'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
		//$current_date = date('Y-m-d');
		foreach ($courses as $course):
		//	if ($current_date < $course['Course']['start_date']) {
	?>
	<tr>
		<td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['description']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['days']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['gender']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['end_date']); ?>&nbsp;</td>
		<td>
			<?php if ($course['Course']['gender'] == "male") { ?>
				<h6>Capacity</h6>
				<div class="progress">
					<?php
					$enrolments_male_percent = intval(($course['Course']['enrolments_male'] / $course['Course']['capacity']) * 100);
					?>
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $enrolments_male_percent; ?>"
						 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $enrolments_male_percent; ?>%">
						<?php echo $enrolments_male_percent; ?>%
					</div>
				</div>
			<?php } else if ($course['Course']['gender'] == "female") { ?>
				<h6>Capacity</h6>
				<div class="progress">
					<?php
					$enrolments_female_percent = intval(($course['Course']['enrolments_female'] / $course['Course']['capacity']) * 100);
					?>
					<div class="progress-bar" role="progressbar"
						 aria-valuenow="<?php echo $enrolments_female_percent; ?>" aria-valuemin="0" aria-valuemax="100"
						 style="width:<?php echo $enrolments_female_percent; ?>%">
						<?php echo $enrolments_female_percent; ?>%
					</div>
				</div>
			<?php } else { ?>
				<h6>Male</h6>
				<div class="progress">
					<?php
					$enrolments_male_percent = intval(($course['Course']['enrolments_male'] / $course['Course']['capacity']) * 100);
					?>
					<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $enrolments_male_percent; ?>"
						 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $enrolments_male_percent; ?>%">
						<?php echo $enrolments_male_percent; ?>%
					</div>
				</div>
				<h6>Female</h6>
				<div class="progress">
					<?php
					$enrolments_female_percent = intval(($course['Course']['enrolments_female'] / $course['Course']['capacity']) * 100);
					?>
					<div class="progress-bar" role="progressbar"
						 aria-valuenow="<?php echo $enrolments_female_percent; ?>" aria-valuemin="0" aria-valuemax="100"
						 style="width:<?php echo $enrolments_female_percent; ?>%">
						<?php echo $enrolments_female_percent; ?>%
					</div>
				</div>
			<?php } ?>

			<?php
				// if anything else than student.
				if (AuthComponent::user('permission') == 'manager' || AuthComponent::user('permission') == 'server') {
				// add auth to here for just managers and servers
				$courseEnrolments = $this->CourseEnrolment->getEnrolments((int)$course['Course']['id']);
					foreach($courseEnrolments as $courseEnrolment) {
						//JM: Check shows managers all enrolled student info, and kitchen help can see med/diet req's of students in their course. 
						if (AuthComponent::user('permission') == 'manager' || (AuthComponent::user('id') == $courseEnrolment['Enrolment']['user_id'] && $courseEnrolment['Enrolment']['role'] != 'student')) {
							$userFullName = $courseEnrolment['User']['first_name'] . ' ' . $courseEnrolment['User']['last_name'];
							echo $this->Html->link(__($userFullName), array('controller' => 'users', 'action' => 'view',  $courseEnrolment['Enrolment']['user_id']));
							// check vars if not empty and not null. Unusual method but accounts for '0' = empty PHP bug.
							$dietaryField = $courseEnrolment['User']['dietary_requirements'];
							$medicalField = $courseEnrolment['User']['medical_requirements'];
							$hasDietary = isset($dietaryField) && $dietaryField != '' && $dietaryField != 'none' && $dietaryField != 'no';
							$hasMedical = isset($medicalField) && $medicalField != '' && $medicalField != 'none' && $medicalField != 'no';
							if ($hasDietary && ($courseEnrolment['Enrolment']['role'] == 'kitchen-helper' || AuthComponent::user('permission') == 'manager')) {
								echo '<i class="diet-med-alert glyphicon glyphicon-alert"></i><span> Dietary</span>';
							}
							if ($hasMedical && ($courseEnrolment['Enrolment']['role'] == 'assistant-teacher' || AuthComponent::user('permission') == 'manager')) {
								echo '<i class="diet-med-alert glyphicon glyphicon-alert"></i><span> Medical</span>';
							}
							echo '<br>';
						}
					}
				}
				?>
	</td>
	<td><?php echo h($course['Course']['enrolments_male']); ?>&nbsp;</td>
	<td><?php echo h($course['Course']['enrolments_female']); ?>&nbsp;</td>
	<td><?php echo h($course['Course']['capacity']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php
				if ($is_old) {	//what is this check for?
					echo $this->Html->link(__('Enrol'), array('controller' => 'enrolments', 'action' => 'add', 'course_id' => $course['Course']['id']));
				}
			?>

			<?php
				if (AuthComponent::user('permission') == 'manager') {
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $course['Course']['id'])));
				}
			?>
		</td>
	</tr>
<?php }
	endforeach; 
?>
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
	<?php
		if (AuthComponent::user('permission') == 'manager') {
			echo $this->Html->link(
				$this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-plus')) . " Add Course",
				array('action' => 'add'),
				array('class' => 'btn btn-primary', 'escape' => false)
				);
		}
		?>
	<div>
		<br>
	<?php
		if (AuthComponent::user('permission') == 'manager') {
			echo $this->Html->link(__('Confirmation Email'), array('action' => 'confirmationEmail'), array('class' => 'btn btn-primary', 'escape' => false));
		}
	?>
	</div>

</div>
