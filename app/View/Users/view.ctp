<div class="users view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><span class="glyphicon glyphicon-user"></span> <?php echo h($user['User']['username']); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Details</h4>
    <div class="well">
      <p><span class="label label-default">Name</span> <span><?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?> </span></p>
      <p><span class="label label-default">DOB</span> <span><?php echo h($user['User']['date_of_birth']); ?> </span></p>
      <p><span class="label label-default">Gender</span> <span><?php echo h($user['User']['gender']); ?> </span></p>
      <p><span class="label label-default">Email</span> <span><?php echo h($user['User']['email_address']); ?> </span></p>
      <p><span class="label label-default">Residential</span> <span><?php echo h($user['User']['residential_address']); ?></span></p>
    </div>
    <h4>Dietary &amp; Medical Requirements</h4>
    <div class="well">
      <p><span class="label label-danger">Dietary</span> <span><?php echo h($user['User']['dietary_requirements']); ?></span></p>
      <p><span class="label label-danger">Medical</span> <span><?php echo h($user['User']['medical_requirements']); ?></span></p>
    </div>
    <h4>Permission</h4>
    <p class="well"><?php echo h($user['User']['permission']); ?></p>
  </div>
</div>
</div>