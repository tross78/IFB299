<div class="users view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><span class="glyphicon glyphicon-user"></span> <?php echo h($user['User']['username']); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Details</h4>
    <div class="well">
      <table class="table table-condensed">
        <thead>
            <tr>
              <td><span class="label label-default">Name</span></td>
              <td><?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?> </span></td>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td><span class="label label-default">DOB</span></td>
              <td><?php echo h($user['User']['date_of_birth']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Gender</span></td>
              <td><?php echo h($user['User']['gender']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Email</span></td>
              <td><?php echo h($user['User']['email_address']); ?></td>
            </tr>
            <tr>
              <td><span class="label label-default">Residential</span></td>
              <td><?php echo h($user['User']['residential_address']); ?></td>
            </tr>
          </tbody>
      </table>
    </div>
    <h4>Dietary &amp; Medical Requirements</h4>
    <div class="well">
      <p><span class="label label-danger">Dietary</span> <span><?php echo h($user['User']['dietary_requirements']); ?></span></p>
      <p><span class="label label-danger">Medical</span> <span><?php echo h($user['User']['medical_requirements']); ?></span></p>
    </div>
    <h4>Enrolments</h4>
    <p class="well">
      <?php
        foreach ($enrolments as $enrolment) {
          echo h($enrolment['Course']['name']);
        }
      ?>
    </p>
    <h4>Permission</h4>
    <p class="well"><?php echo h($user['User']['permission']); ?></p>
  </div>
</div>
</div>