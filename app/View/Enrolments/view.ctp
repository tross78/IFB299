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
          </tbody>
      </table>
    </div>
	<h4>Waitlist</h4>
	<div class="well">
	      <p><span class="label label-danger">Waitlisted?</span> <span><?php echo h($enrolment['Enrolment']['waitlist']); ?></span></p>
	</div>
	<h4>Classes</h4>
	<div class="well">
	<table class="table table-condensed">
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
</div>