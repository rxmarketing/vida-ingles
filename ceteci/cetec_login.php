<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 01:53 PM
 */
include_once("inc/check_session.php");
// If user is logged in, send him to his profile page
if ($admin_ok == true) {
    header("location: user.php?username=" . $_SESSION["username"]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css"/>
	<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/cetec.css">
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script src="../bower_components/tether/dist/js/tether.min.js"></script>
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/ceteci.js"></script>
	<script>
	</script>
	<style>
		/* Sticky footer styles
-------------------------------------------------- */
		html {
			position: relative;
			min-height: 100%;
		}

		body {
			/* Margin bottom by footer height */
			margin-bottom: 60px;
		}

		.form-signin {
			max-width: 330px;
			padding: 15px;
			margin: 0 auto;
		}

		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			/* Set the fixed height of the footer here */
			height: 60px;
			line-height: 60px; /* Vertically center the text there */
			background-color: #f5f5f5;
		}

		/* Custom page CSS
    -------------------------------------------------- */
		/* Not required for template or sticky footer method. */
	</style>
</head>
<body>
<?php include_once 'templates/topnav-template.php'; ?>
<div class="container">
	<form method="post" action="php/php_cetec_login.php" id="loginform" class="form-signin" role="form">
		<h2 class="form">Iniciar sesi&oacute;n</h2>
		<div class="label sr-only">Correo electr&oacute;nico:</div>
		<input type="text" name="email" id="email" class="form-control" placeholder="Correo electrónico" maxlength="88" autofocus/>
		<div class="label sr-only">Contraseña</div>
		<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" maxlength="100">
		<button id="btn-signin" class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>
		<div id="status"></div>
	</form>
</div>
<footer class="footer">
	<div class="container">
		<small>Dashboard v.2.0.0</small>
	</div>
</footer>
</body>
</html>