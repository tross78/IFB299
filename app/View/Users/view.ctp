<div class="users view">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title"><span class="glyphicon glyphicon-user"></span> <?php echo h($user['User']['username']); ?></h1>
  </div>
  <div class="panel-body">
  <h3>Name</h3>
    <p class="well"><?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?></p>
    <h3>Date Of Birth</h3>
    <p class="well"><?php echo h($user['User']['date_of_birth']); ?></p>
    <h3>Gender</h3>
    <p class="well"><?php echo h($user['User']['gender']); ?></p>
    <h3>Email Address</td>
    <p class="well"><?php echo h($user['User']['email_address']); ?></p>
    <h3>Residential Address</h3>
    <p class="well"><?php echo h($user['User']['residential_address']); ?></p>
    <h3>Dietary Requirements</h3>
    <p class="well"><?php echo h($user['User']['dietary_requirements']); ?></p>
    <h3>Medical Requirements</h3>
    <p class="well"><?php echo h($user['User']['medical_requirements']); ?></p>
    <h3>Permission</h3>
    <p class="well"><?php echo h($user['User']['permission']); ?></p>
  </div>
</div>
</div>