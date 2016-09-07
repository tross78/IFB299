<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Meditation Centre: Team Hawke.');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		//echo $this->Html->meta('icon');
		echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));
		echo $this->Html->css('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->script("jquery.min") ?>
    <?php echo $this->Html->script("bootstrap.min") ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append �#!watch� to the browser URL, then refresh the page. -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <?php echo $this->Html->script("html5shiv"); ?>
    <![endif]--> 
</head>
<body>
			<div class=" navbar navbar-inverse">
				<div class="navbar-header">
					<?php echo $this->Html->link($cakeDescription, '/', array('class' => 'navbar-brand')); ?>
				</div>
				<?php 
					$currentUrl = Router::normalize($this->request->here);
				?>
				<ul class="nav navbar-nav">
					<li <?php if (strpos($currentUrl, '/home' !== false) || $currentUrl === '/') echo 'class="active"';  ?> ><a href="/">Home</a></li>
					<li <?php if (strpos($currentUrl, '/about') !== false) echo 'class="active"';  ?> ><a href="/about">About</a></li>
					<li <?php if (strpos($currentUrl, '/donations') !== false) echo 'class="active"';  ?> ><a href="/donations">Donations</a></li> 
					<li <?php if (strpos($currentUrl, '/contact') !== false) echo 'class="active"';  ?> ><a href="/contact">Contact Us</a></li> 
					<li <?php if (strpos($currentUrl, '/courses') !== false) echo 'class="active"';  ?> ><a href="/courses/">Courses</a></li>
				</ul>
				
					<?php if (AuthComponent::user('id')) { ?>
						<ul class="nav navbar-nav navbar-right">
							<li class="navbar-text">Logged in as <?= AuthComponent::user('full_name') ?></li>
							<li><?= $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?></li>
						</ul>
					<?php } else { ?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="/users/add"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							<li><a href="/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						</ul>
					<?php } ?>
			</div>
		<div class="content container bg-warning">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer class="footer">
			<div class="navbar navbar-fixed-bottom navbar-inverse">
				<p class="navbar-text">&copy; 2016 Team Hawke</p>
			</div>
		</footer>
</body>
</html>
