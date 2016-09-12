<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
	<meta name="author" content="GeeksLabs">
	<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
	<link rel="shortcut icon" href="img/favicon.png">

	<title>Minutas de Trabajo</title>
	
	<link href="<?php echo base_url('font-awesome/css/font-awesome.css')?>" rel="stylesheet">
	<!-- Bootstrap CSS -->    
	<link href="<?php echo base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="<?php echo base_url('css/bootstrap-theme.css') ?>" rel="stylesheet">
	<!--external css-->
	<!-- font icon -->
	<link href="<?php echo base_url('css/elegant-icons-style.css') ?>" rel="stylesheet" />
	<link href="<?php echo base_url('css/font-awesome.min.css') ?>" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/style-responsive.css') ?>" rel="stylesheet" />
	<!-- Alerts -->
	<link href="<?php echo base_url('css/sweetalert2.min.css') ?>" rel="stylesheet" />

	<!-- javascripts -->
	
	<script src="<?php echo base_url('js/jquery-2.1.1.js') ?>"></script>
	<script src="<?php echo base_url('js/jquery.validate.min.js');?>"></script>
	<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
	<!-- nice scroll -->
	<script src="<?php echo base_url('js/jquery.scrollTo.min.js') ?>"></script>
	<script src="<?php echo base_url('js/jquery.nicescroll.js') ?>" type="text/javascript"></script><!--custome script for all page-->
	<script src="<?php echo base_url('js/scripts.js') ?>"></script>
	<!-- Alerts -->
	<script src="<?php echo base_url('js/sweetalert2.min.js') ?>"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	  <script src="js/lte-ie7.js"></script>
	<![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
	  <!--header start-->
	  
	  <header class="header dark-bg">
			<div class="toggle-nav">
				<div class="icon-reorder"><i class="icon_menu"></i></div>
			</div>

			<!--logo start-->
			<a href="<?php echo base_url('inicio/principal') ?>" class="logo">Minutas d<span class="lite">e Trabajo</span></a>
			<!--logo end-->

			<div class="top-nav notification-row">                
				<!-- notificatoin dropdown start-->
				<ul class="nav pull-right top-menu">
					<!-- user login dropdown start-->
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="profile-ava">
								<i class="fa fa-user fa-lg"></i>
							</span>
							<span class="username"><?php echo $this->session->userdata("nombre"); ?></span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<div class="log-arrow-up"></div>
							<li class="eborder-top">
								<a href="#"><i class="fa fa-user"></i> Perfil</a>
							</li>
							<li>
								<a href="<?php echo base_url('') ?>"><i class="icon_key_alt"></i> Cerrar sesión</a>
							</li>
						</ul>
					</li>
					<!-- user login dropdown end -->
				</ul>
				<!-- notificatoin dropdown end-->
			</div>
	  </header>      
	  <!--header end-->

