<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><?php echo h($course['Course']['name']); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Details</h4>
    <div class="well">
      <table class="table table-condensed">
        <thead>
            <tr>
              <td><span class="label label-default">Description</span></td>
              <td><?php echo h($course['Course']['description']); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td><span class="label label-default">Days</span></td>
              <td><?php echo h($course['Course']['days']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Gender</span></td>
              <td><?php echo h($course['Course']['gender']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Dates</span></td>
              <td><?php echo h($course['Course']['start_date']). " - "; ?> <?php echo h($course['Course']['end_date']); ?> </span></td>
            </tr>
            <tr>
              <td><span class="label label-default">Capacity</span></td>
              <td><?php echo h($course['Course']['capacity']); ?></td>
            </tr>
          </tbody>
      </table>
    </div>
  </div>
 </div>
	<dl class="dl-horizontal">
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($course['Course']['description']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Days'); ?></dt>
		<dd>
			<?php echo h($course['Course']['days']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($course['Course']['gender']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($course['Course']['start_date']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($course['Course']['end_date']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Males'); ?></dt>
		<dd>
			<?php echo h($course['Course']['enrolments_male']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Females'); ?></dt>
		<dd>
			<?php echo h($course['Course']['enrolments_female']); ?>
			<br><br>
		</dd>
		<dt><?php echo __('Capacity'); ?></dt>
		<dd>
			<?php echo h($course['Course']['capacity']); ?>
			<br><br>
		</dd>
	</dl>
	<h4>Course Enrolments:</h4>
	<div class="well">
     <?php
        foreach ($enrolments as $enrol) {
		  $name = (($enrol['User']['first_name']) . " " . ($enrol['User']['last_name']) . " - " . ($enrol['Enrolment']['role']));
		  echo "<p>" . $this->Html->link($name, array('controller' => 'users', 'action' => 'view', $enrol['User']['id'])) . "</p>";
        }
      ?>
    </div>
</div>