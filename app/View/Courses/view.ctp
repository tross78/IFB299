<div class="courses view">
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
			 <tr>
              <td><span class="label label-default">Enrolments</span></td>
              <td><?php echo h($course['Course']['enrolments_male']). " (M), "; ?> <?php echo h($course['Course']['enrolments_female']). " (F)"; ?> </span></td>
            </tr>
          </tbody>
      </table>
    </div>
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
 </div>
</div>