<div class="users view">
<h1><span class="glyphicon glyphicon-user"></span> <?php echo h($user['User']['username']); ?></h1>
<div class="panel panel-default">
  <div class="panel-heading">
    
  </div>
  <div class="panel-body">
    
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Name</h2>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['first_name']); ?> <?php echo h($user['User']['last_name']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Date Of Birth</h2>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['date_of_birth']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Gender</h2>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['gender']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Email Address</td>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['email_address']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Residential Address</h2>
  </div>
  <div class="panel-body">
    <p class="well"><?php echo h($user['User']['residential_address']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Dietary Requirements</h2>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['dietary_requirements']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Medical Requirements</h2>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['medical_requirements']); ?></p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Permission</h2>
  </div>
  <div class="panel-body">
    <p><?php echo h($user['User']['permission']); ?></p>
  </div>
</div>
</div>