<div class="users view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><span class="glyphicon glyphicon-user"></span> <?php echo h($user['User']['username']); ?></h1>
  </div>
  <div class="panel-body">
  <h4>Details</h4>
    <p class="well">
      <p class="label label-default">Name</p> <?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?> 
      <p class="label label-default">DOB</p> <?php echo h($user['User']['date_of_birth']); ?> 
      <p class="label label-default">Gender</p> <?php echo h($user['User']['gender']); ?> 
      <p class="label label-default">Email</p> <?php echo h($user['User']['email_address']); ?>
      <p class="label label-default">Residential</p> <?php echo h($user['User']['residential_address']); ?>
    </p>
    <h4>Dietary &amp; Medical Requirements</h4>
    <p class="well">
      <p class="label label-default">Dietary</p> <?php echo h($user['User']['dietary_requirements']); ?></p>
      <p class="label label-default">Medical</p> <?php echo h($user['User']['medical_requirements']); ?></p>
    </p>
    <h4>Permission</h4>
    <p class="well"><?php echo h($user['User']['permission']); ?></p>
  </div>
</div>
</div>