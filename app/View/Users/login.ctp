<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php echo $this->Form->input('username', array('class' => 'form-control', 'div' => 'form-group'));
        echo $this->Form->input('password', array('class' => 'form-control', 'div' => 'form-group'));
    ?>
    </fieldset>
	<?php echo $this->Form->submit('Login', array(
				'div' => false,
				'class' => 'btn btn-primary'
			));
	echo $this->Form->end();
    ?>
</div>