<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
		<link rel="shortcut icon" href="<?php echo base_url('img/favicon.png') ?>">

		<title>Inicio</title>

		<!-- Bootstrap CSS -->    
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- bootstrap theme -->
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<!--external css-->
		<!-- font icon -->
		<link href="css/elegant-icons-style.css" rel="stylesheet" />
		<link href="css/font-awesome.css" rel="stylesheet" />
		<!-- Custom styles -->
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-responsive.css" rel="stylesheet" />

		<script src="<?php echo base_url('js/jquery-2.1.1.js') ?>"></script>

		<!-- Alerts -->
		<link href="<?php echo base_url('css/sweetalert2.min.css') ?>" rel="stylesheet" />
		<script src="<?php echo base_url('js/sweetalert2.min.js') ?>"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="login-img3-body">
		<div class="container">
			<form class="login-form" method="POST" action="<?php echo base_url('') ?>">
				<div class="login-wrap">
					<p class="login-img"><i class="icon_lock_alt"></i></p>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_profile"></i></span>
						<input type="text" class="form-control" name="email" placeholder="Correo electronico" autofocus>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Contraseña">
					</div>
					<button class="btn btn-primary btn-lg btn-block" type="submit" id="iniciar">Iniciar sesión</button>
				</div>
			</form>
		</div>
	</body>
</html>
