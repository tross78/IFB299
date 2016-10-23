<div class="enrolments view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><?php echo $this->Html->link($user['User']['full_name'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])). "'s Enrolment in " . $this->Html->link($course['Course']['name'], array('controller' => 'courses', 'action' => 'view', $course['Course']['id'])); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Enrolment Details</h4>
    <div class="well">
      <table class="table table-condensed">
        <thead>
            <tr>
              <td><span class="label label-default">Course</span></td>
              <td><?php echo $this->Html->link($course['Course']['name'], array('controller' => 'courses', 'action' => 'view', $course['Course']['id'])); ?></td>
            </tr>
        </thead>
        <tbody>
			<tr>
              <td><span class="label label-default">User</span></td>
              <td><?php echo $this->Html->link($user['User']['full_name'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Role</span></td>
              <td><?php echo h($enrolment['Enrolment']['role']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Enrolment Date</span></td>
              <td><?php echo h($enrolment['Enrolment']['enrolment_date']); ?></td>
            </tr>
			<tr>
              <td><span class="label label-danger">Waitlist Status</span></td>
              <td><?php echo h($enrolment['Enrolment']['waitlist']); ?></td>
            </tr>
          </tbody>
      </table>
    </div>
	<h4>Timetable</h4>
	<div class="well">
	<table class="table table-condensed">
	<thead>
            <tr>
              <td><span class="label label-success">7am</span></td>
              <td><?php echo "Morning Stretches"; ?></td>
            </tr>
        </thead>
        <tbody>
			<tr>
              <td><span class="label label-success">8am</span></td>
              <td><?php echo "Breakfast"; ?></td>
            </tr>
			<tr>
              <td><span class="label label-warning">9am</span></td>
              <td><?php echo h($enrolment['Enrolment']['class_one']); ?></td>
            </tr>
			<tr>
              <td><span class="label label-success">11am</span></td>
              <td><?php echo "Morning-Tea"; ?></td>
            </tr>
            <tr>
              <td><span class="label label-warning">12pm</span></td>
              <td><?php echo h($enrolment['Enrolment']['class_two']); ?></td>
            </tr>
			<tr>
              <td><span class="label label-success">2pm</span></td>
              <td><?php echo "Lunch"; ?></td>
            </tr>
            <tr>
              <td><span class="label label-warning">3pm</span></td>
              <td><?php echo h($enrolment['Enrolment']['class_three']); ?></td>
            </tr>
			<tr>
              <td><span class="label label-success">5pm</span></td>
              <td><?php echo "Afternoon Stroll"; ?></td>
            </tr>
			<tr>
              <td><span class="label label-success">6pm</span></td>
              <td><?php echo "Dinner"; ?></td>
            </tr>
			<tr>
              <td><span class="label label-success">10pm</span></td>
              <td><?php echo "Lights Out"; ?></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
 </div>
</div>