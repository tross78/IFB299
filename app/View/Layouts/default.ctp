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

$cakeDescription = __d('cake_dev', 'Hawke Meditation');
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
		echo $this->fetch('css');
		echo $this->fetch('meta');
		echo $this->fetch('script');
	?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<!-- Critical CSS -->
	<style>

		body {
			margin: 0;
		}

		html {
		font-family: sans-serif;
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
		font-size: 10px;
		}

		a {
		background-color: transparent;
		}

		strong {
		font-weight: 700;
		}

		img {
		border: 0;
		vertical-align: middle;
		}

		table {
		border-collapse: collapse;
		border-spacing: 0;
		}

		td,
		th {
		padding: 0;
		}

		body {
		background-color: #fff;
		}

		.btn {
		background-image: none;
		}

		@font-face {
		font-family: 'Glyphicons Halflings';
		src: url(../fonts/glyphicons-halflings-regular.eot);
		src: url(../fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'),url(../fonts/glyphicons-halflings-regular.woff2) format('woff2'),url(../fonts/glyphicons-halflings-regular.woff) format('woff'),url(../fonts/glyphicons-halflings-regular.ttf) format('truetype'),url(../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular) format('svg');
		}

		.glyphicon {
		position: relative;
		top: 1px;
		display: inline-block;
		font-family: 'Glyphicons Halflings';
		font-style: normal;
		font-weight: 400;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		}

		.glyphicon-user:before {
		content: "\e008";
		}

		.glyphicon-chevron-left:before {
		content: "\e079";
		}

		.glyphicon-chevron-right:before {
		content: "\e080";
		}

		.glyphicon-log-in:before {
		content: "\e161";
		}

		*,
		:after,
		:before {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		}

		body {
		font-family: Ubuntu,Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size: 14px;
		line-height: 1.42857143;
		color: #333;
		}

		a {
		color: #5bc0de;
		text-decoration: none;
		}

		.carousel-inner>.item>img {
		display: block;
		max-width: 100%;
		height: auto;
		}



		h2,
		h4 {
		font-family: Ubuntu,Tahoma,"Helvetica Neue",Helvetica,Arial,sans-serif;
		font-weight: 500;
		line-height: 1.1;
		color: inherit;
		}

		h2 {
		margin-top: 20px;
		margin-bottom: 10px;
		}

		h4 {
		margin-top: 10px;
		margin-bottom: 10px;
		}

		h2 {
		font-size: 30px;
		}

		h4 {
		font-size: 18px;
		}

		p {
		margin: 0 0 10px;
		}

		.btn,
		.text-center {
		text-align: center;
		}

		.bg-warning {
		background-color: #fcf8e3;
		}

		table {
		background-color: transparent;
		}

		ol,
		ul {
		margin-top: 0;
		}

		ol,
		ul {
		margin-bottom: 10px;
		}

		ul ul {
		margin-bottom: 0;
		}

		th {
		text-align: left;
		}

		.container,
		.container-fluid {
		margin-right: auto;
		margin-left: auto;
		}

		.container,
		.container-fluid {
		padding-left: 15px;
		padding-right: 15px;
		}

		@media (min-width:768px) {
		.container {
			width: 750px;
		}
		}

		@media (min-width:992px) {
		.container {
			width: 970px;
		}
		}

		@media (min-width:1200px) {
		.container {
			width: 1170px;
		}
		}

		.row {
		margin-left: -15px;
		margin-right: -15px;
		}

		.col-sm-12 {
		position: relative;
		min-height: 1px;
		padding-left: 15px;
		padding-right: 15px;
		}

		@media (min-width:768px) {
		.col-sm-12 {
			float: left;
		}

		.col-sm-12 {
			width: 100%;
		}
		}

		.btn {
		display: inline-block;
		margin-bottom: 0;
		font-weight: 400;
		vertical-align: middle;
		touch-action: manipulation;
		border: 1px solid transparent;
		white-space: nowrap;
		padding: 8px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		border-radius: 4px;
		}

		.btn-primary {
		color: #fff;
		background-color: #f0ad4e;
		border-color: #f0ad4e;
		}

		.btn-lg {
		padding: 14px 16px;
		font-size: 18px;
		line-height: 1.3333333;
		border-radius: 6px;
		}

		.nav>li,
		.nav>li>a {
		position: relative;
		display: block;
		}

		.nav {
		margin-bottom: 0;
		padding-left: 0;
		list-style: none;
		}

		.nav>li>a {
		padding: 10px 15px;
		}

		.navbar {
		position: relative;
		min-height: 50px;
		margin-bottom: 20px;
		border: 1px solid transparent;
		}

		@media (min-width:768px) {
		.navbar {
			border-radius: 4px;
		}

		.navbar-header {
			float: left;
		}
		}

		.carousel-inner {
		overflow: hidden;
		}

		.container-fluid>.navbar-header {
		margin-right: -15px;
		margin-left: -15px;
		}

		.navbar-fixed-bottom {
		position: fixed;
		right: 0;
		left: 0;
		z-index: 1030;
		}

		.navbar-fixed-bottom {
		bottom: 0;
		margin-bottom: 0;
		border-width: 1px 0 0;
		}

		.navbar-brand {
		float: left;
		padding: 15px;
		font-size: 18px;
		line-height: 20px;
		height: 50px;
		}

		@media (min-width:768px) {
		.container-fluid>.navbar-header {
			margin-right: 0;
			margin-left: 0;
		}

		.navbar-fixed-bottom {
			border-radius: 0;
		}

		.navbar>.container-fluid .navbar-brand {
			margin-left: -15px;
		}
		}

		.navbar-nav {
		margin: 7.5px -15px;
		}

		.navbar-nav>li>a {
		padding-top: 10px;
		padding-bottom: 10px;
		line-height: 20px;
		}

		@media (min-width:768px) {
		.navbar-nav {
			float: left;
			margin: 0;
		}

		.navbar-nav>li {
			float: left;
		}

		.navbar-nav>li>a {
			padding-top: 15px;
			padding-bottom: 15px;
		}
		}

		.navbar-text {
		margin-top: 15px;
		margin-bottom: 15px;
		}

		@media (min-width:768px) {
		.navbar-text {
			float: left;
			margin-left: 15px;
			margin-right: 15px;
		}

		.navbar-right {
			float: right!important;
			margin-right: -15px;
		}
		}

		.navbar-inverse {
		background-color: #8e856f;
		border-color: #716a59;
		}

		.navbar-inverse .navbar-brand {
		color: #fff;
		}

		.navbar-inverse .navbar-nav>li>a,
		.navbar-inverse .navbar-text {
		color: #fff;
		}

		.navbar-inverse .navbar-nav>.active>a {
		color: #fff;
		background-color: #716a59;
		}

		.jumbotron {
		color: inherit;
		}

		.jumbotron {
		padding-top: 30px;
		padding-bottom: 30px;
		margin-bottom: 30px;
		background-color: #eee;
		}

		@media screen and (min-width:768px) {
		.jumbotron {
			padding-top: 48px;
			padding-bottom: 48px;
		}
		}

		.well {
		min-height: 20px;
		padding: 19px;
		margin-bottom: 20px;
		background-color: #f5f5f5;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		}

		.carousel-caption,
		.carousel-control {
		color: #fff;
		text-shadow: 0 1px 2px rgba(0,0,0,.6);
		}

		.carousel,
		.carousel-inner {
		position: relative;
		}

		.carousel-inner {
		width: 100%;
		}

		.carousel-inner>.item {
		display: none;
		position: relative;
		}

		.carousel-inner>.item>img {
		line-height: 1;
		}

		@media all and (transform-3d),(-webkit-transform-3d) {
		.carousel-inner>.item {
			-webkit-backface-visibility: hidden;
			-moz-backface-visibility: hidden;
			backface-visibility: hidden;
			-webkit-perspective: 1000px;
			-moz-perspective: 1000px;
			perspective: 1000px;
		}

		.carousel-inner>.item.active {
			-webkit-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
			left: 0;
		}
		}

		.carousel-inner>.active {
		display: block;
		}

		.carousel-inner>.active {
		left: 0;
		}

		.carousel-control {
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
		width: 15%;
		opacity: .5;
		filter: alpha(opacity=50);
		font-size: 20px;
		text-align: center;
		background-color: transparent;
		}

		.carousel-control.left {
		background-image: -webkit-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
		background-image: -o-linear-gradient(left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
		background-image: linear-gradient(to right,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
		background-repeat: repeat-x;
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
		}

		.carousel-control.right {
		left: auto;
		right: 0;
		background-image: -webkit-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
		background-image: -o-linear-gradient(left,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
		background-image: linear-gradient(to right,rgba(0,0,0,.0001) 0,rgba(0,0,0,.5) 100%);
		background-repeat: repeat-x;
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
		}

		.carousel-control .glyphicon-chevron-left,
		.carousel-control .glyphicon-chevron-right {
		position: absolute;
		top: 50%;
		margin-top: -10px;
		z-index: 5;
		display: inline-block;
		}

		.carousel-control .glyphicon-chevron-left {
		left: 50%;
		margin-left: -10px;
		}

		.carousel-control .glyphicon-chevron-right {
		right: 50%;
		margin-right: -10px;
		}

		.carousel-indicators {
		position: absolute;
		bottom: 10px;
		left: 50%;
		z-index: 15;
		width: 60%;
		margin-left: -30%;
		padding-left: 0;
		list-style: none;
		text-align: center;
		}

		.carousel-indicators li {
		display: inline-block;
		width: 10px;
		height: 10px;
		margin: 1px;
		text-indent: -999px;
		border: 1px solid #fff;
		border-radius: 10px;
		background-color: #000\9;
		background-color: transparent;
		}

		.carousel-indicators .active {
		margin: 0;
		width: 12px;
		height: 12px;
		background-color: #fff;
		}

		.carousel-caption {
		position: absolute;
		left: 15%;
		right: 15%;
		bottom: 20px;
		z-index: 10;
		padding-top: 20px;
		padding-bottom: 20px;
		text-align: center;
		}

		@media screen and (min-width:768px) {
		.carousel-control .glyphicon-chevron-left,
		.carousel-control .glyphicon-chevron-right {
			width: 30px;
			height: 30px;
			margin-top: -10px;
			font-size: 30px;
		}

		.carousel-control .glyphicon-chevron-left {
			margin-left: -10px;
		}

		.carousel-control .glyphicon-chevron-right {
			margin-right: -10px;
		}

		.carousel-caption {
			left: 20%;
			right: 20%;
			padding-bottom: 30px;
		}

		.carousel-indicators {
			bottom: 20px;
		}
		}

		.container-fluid:after,
		.container-fluid:before,
		.container:after,
		.container:before,
		.nav:after,
		.nav:before,
		.navbar-header:after,
		.navbar-header:before,
		.navbar:after,
		.navbar:before,
		.row:after,
		.row:before {
		content: " ";
		display: table;
		}

		.container-fluid:after,
		.container:after,
		.nav:after,
		.navbar-header:after,
		.navbar:after,
		.row:after {
		clear: both;
		}

		@-ms-viewport {
			width: device-width;
		}

		.navbar-brand {
			min-width: 220px;
			margin-left: 20px !important;
		}

		.page-container {
			background: url(/img/bg-pattern.png) repeat #fcf8e3;
			min-height:100%;
		}

				
		.jumbotron {
			background: url("/img/wov.png") repeat #91836b;
			height:130px;
			padding: 15px 0px 15px 0px;
			margin-bottom: 0;
		}

		/* The logo animation */
		@keyframes logo-anim {
			from {margin: -120px 0 0 0;}
			to {margin: 0;}
		}

		.jumbotron .block-center {
			margin: -120px 0 0 0;
			 -webkit-animation-name: logo-anim; /* Safari 4.0 - 8.0 */
			-webkit-animation-duration: 2s; /* Safari 4.0 - 8.0 */
			animation-name: logo-anim;
			animation-duration: 2s;
		}

		/* The carosel animation */
		@keyframes carousel-anim {
			from {height: 0;}
			to {height:292px ;}
		}

		.home-carousel-row {
			height:0px;
			overflow: hidden;
			-webkit-animation-name: carousel-anim; /* Safari 4.0 - 8.0 */
			-webkit-animation-duration: 2s; /* Safari 4.0 - 8.0 */
			-webkit-animation-delay: 0.5s;
			animation-name: carousel-anim;
			animation-duration: 2s;
			animation-delay: 0.5s;
		}

		.content {
			padding-bottom:80px;
		}

</style>
    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append �#!watch� to the browser URL, then refresh the page. -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <?php echo $this->Html->script("html5shiv"); ?>
    <![endif]-->
</head>
<body onload="document.body.setAttribute('class','loaded')">
	<div class="page-container bg-warning">
	<div class="jumbotron"><div class="block-center text-center"><img src="/img/logo.png" class="" style="
    max-height: 100px;
"></div></div>
			<div class="navbar navbar-inverse">
				<div class="container-fluid">
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
						<?php if (AuthComponent::user('id')):?>
							<li <?php if (strpos($currentUrl, '/enrolments') !== false) echo 'class="active"';  ?> ><a href="/enrolments/">Enrolments</a></li>
						<?php endif;?>
						<?php if (AuthComponent::user('permission') == 'manager'):?>
							<li <?php if (strpos($currentUrl, '/users') !== false) echo 'class="active"';  ?> ><a href="/users/">Users</a></li>
						<?php endif;?>
					</ul>

						<?php if (AuthComponent::user('id')) { ?>
							<ul class="nav navbar-nav navbar-right">
								<li class="nav navbar-text" style=" "><span class="pull-left glyphicon glyphicon-user"></span> <a href="/users/view/<?= AuthComponent::user('id') ?>" style="padding:0;margin-left:25px;"><?= AuthComponent::user('full_name') ?></a></li>

								<li class="nav navbr-text" style="margin:0;"><a href="/users/edit/<?= AuthComponent::user('id') ?>">Edit</a></li>
								<li><?= $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?></li>
							</ul>
						<?php } else { ?>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="/users/add"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
								<li><a href="/users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							</ul>
						<?php } ?>
				</div>
			</div>
		<div class="content container">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<footer class="footer">
			<div class="navbar navbar-fixed-bottom navbar-inverse">
				<p class="navbar-text">&copy; 2016 Team Hawke</p>
			</div>
		</footer>
    </div>
		<script type="text/javascript" async src="/js/bundle.js"></script>
		<?php 
			echo $this->Html->css('bootstrap.min');
			echo $this->Html->css('styles');
		?>
</body>
</html>
