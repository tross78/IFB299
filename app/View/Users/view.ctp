<div class="users view">
<h2><?php echo __('User'); ?></h2>
<table class="table">
<tbody>
<tr>
<td><?php echo __('Username'); ?></td>
<td><?php echo h($user['User']['username']); ?></td>
</tr>
<tr>
<td><?php echo __('First Name'); ?></td>
<td><?php echo h($user['User']['first_name']); ?></td>
</tr>
<tr>
<td><?php echo __('Last Name'); ?></td>
<td><?php echo h($user['User']['last_name']); ?></td>
</tr>
<tr>
<td><?php echo __('Date Of Birth'); ?></td>
<td><?php echo h($user['User']['date_of_birth']); ?></td>
</tr>
<tr>
<td><?php echo __('Gender'); ?></td>
<td><?php echo h($user['User']['gender']); ?></td>
</tr>
<tr>
<td><?php echo __('Email Address'); ?></td>
<td><?php echo h($user['User']['email_address']); ?></td>
</tr>
<tr>
<td><?php echo __('Residential Address'); ?></td>
<td><?php echo h($user['User']['residential_address']); ?></td>
</tr>
<tr>
<td><?php echo __('Dietary Requirements'); ?></td>
<td><?php echo h($user['User']['dietary_requirements']); ?></td>
</tr>
<tr>
<td><?php echo __('Medical Requirements'); ?></td>
<td><?php echo h($user['User']['medical_requirements']); ?></td>
</tr>
<tr>
<td><?php echo __('Permission'); ?></td>
<td><?php echo h($user['User']['permission']); ?></td>
</tr>
</tbody>
</table>
</div>