<?php
include_once("inc/check_session.php");
if ($student_ok !== true) {
    header("location: cetec_login.php");
    exit();
}
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 17/04/2017
 * Time: 04:48 PM
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cambiar contraseña</title>
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
	<form method="post" action="php/php_changepass.php" id="changepassFrm" name="changepassFrm" class="form-signin" role="form">
		<h2 class="">Cambiar contraseña</h2>
		<div id="npasswordaviso"></div>
		<label for="npassword" id="" class="control-label">Nueva contraseña</label>
		<input type="password" name="npassword" id="npassword" size="20" autocomplete="off" class="form-control data" placeholder="Escribe nueva contraseña" autofocus/>
		<div id="cpasswordaviso"></div>
		<label for="cpassword" id="cpasswordLabel" class="control-label">Escribe otra vez contraseña</label>
		<input type="password" name="cpassword" id="cpassword" size="20" autocomplete="off" class="form-control data" placeholder="Escribe contraseña otra vez"/>
		<button id="btn-changepass" class="btn btn-lg btn-primary btn-block">Cambiar contraseña</button>
		<br/>
		<div id="changepassaviso"></div>
		<div class="small text-login"></div>
	</form>
</div>
<footer class="footer">
	<div class="container">
		<small>&copy; <?php echo date('Y'); ?> - Dashboard v.2.0.0</small>
	</div>
</footer>
</body>
</html>