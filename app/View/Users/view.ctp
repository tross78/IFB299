<div class="users view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><span class="glyphicon glyphicon-user"></span> <?php echo h($user['User']['username']); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Details</h4>
    <p class="well"><span class="label label-default">Name</span> <?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?> <span class="label label-default">DOB</span> <?php echo h($user['User']['date_of_birth']); ?> <span class="label label-default">Gender</span> <?php echo h($user['User']['gender']); ?> </p>
    <h4>Email Address</h4>
    <p class="well"><?php echo h($user['User']['email_address']); ?></p>
    <h4>Residential Address</h4>
    <p class="well"><?php echo h($user['User']['residential_address']); ?></p>
    <h4>Dietary Requirements</h4>
    <p class="well"><?php echo h($user['User']['dietary_requirements']); ?></p>
    <h4>Medical Requirements</h4>
    <p class="well"><?php echo h($user['User']['medical_requirements']); ?></p>
    <h4>Permission</h4>
    <p class="well"><?php echo h($user['User']['permission']); ?></p>
  </div>
</div>
</div>