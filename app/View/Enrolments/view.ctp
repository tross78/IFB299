<div class="enrolments view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><?php echo "Enrolment in: " . $this->Html->link($course['Course']['name'], array('controller' => 'courses', 'action' => 'view', $course['Course']['id'])); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Enrolment Details</h4>
    <div class="well">
      <table class="table table-condensed">
        <thead>
            <tr>
              <td><span class="label label-default">User</span></td>
              <td><?php echo $this->Html->link($user['User']['full_name'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td><span class="label label-default">Role</span></td>
              <td><?php echo h($enrolment['Enrolment']['role']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Enrolment Date</span></td>
              <td><?php echo h($enrolment['Enrolment']['enrolment_date']); ?></td>
            </tr>
            <tr>
			if ($enrolment['Enrolment']['waitlist'] == "yes"){
				<td><span class="label label-danger">Waitlist Position</span></td>
			}else{
				<td><span class="label label-default">Waitlist Position</span></td>
			}
              <td><?php echo h($enrolment['Enrolment']['waitlist']); ?></td>
            </tr>
          </tbody>
      </table>
    </div>
	<h4>Classes</h4>
	<div class="well">
	<thead>
            <tr>
              <td><span class="label label-default">9am</span></td>
              <td><?php echo h($enrolment['Enrolment']['class_one']); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td><span class="label label-default">12pm</span></td>
              <td><?php echo h($enrolment['Enrolment']['class_two']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">3pm</span></td>
              <td><?php echo h($enrolment['Enrolment']['class_three']); ?></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
 </div>


<h2><?php echo __('Enrolment'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['User']['full_name'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['Course']['name'], array('controller' => 'courses', 'action' => 'view', $course['Course']['id'])); ?>
			<br><br>
		</dd>
		<dt><?php echo __('9am Class'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['class_one']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('12pm Class'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['class_two']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('3pm Class'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['class_three']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Enrolment Date'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['enrolment_date']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['role']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Waitlist Position'); ?></dt>
		<dd>
			<?php echo h($enrolment['Enrolment']['waitlist']); ?>
			<br>
		</dd>
	</dl>
</div>