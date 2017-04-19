<?php
use database\DB;

include_once("inc/check_session.php");
include "classes/DB.php";

if (!empty($_POST)) {
    $matricula = $_POST['matricula'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $pass_hash = hash('SHA512', $pass);

    DB::query("UPDATE cetec.estudiantes set 
estud_username = :u,
estud_email = :e,
estud_pass = :p
WHERE estud_matricula = '$matricula'", array(':u' => $username, ':e' => $email, ':p' => $pass_hash));
    echo "Success!!";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Activar cuenta</title>
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

		.form-signin input[type="text"] {
			margin-bottom: 10px;
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
	<form method="post" action="activate_acc.php" id="loginform" class="form-signin" role="form">
		<h2 class="form">Activar cuenta</h2>
		<div class="label sr-only">Matrícula</div>
		<input type="text" name="matricula" id="matricula" class="form-control" placeholder="Ingresa tu matrícula" maxlength="14" autofocus/>
		<div class="label sr-only">Username</div>
		<input type="text" name="username" id="username" class="form-control" placeholder="Crea tu nombre de usuario" maxlength="88"/>
		<div class="label sr-only">Correo electr&oacute;nico</div>
		<input type="text" name="email" id="email" class="form-control" placeholder="Tu correo electrónico" maxlength="88"/>
		<div class="label sr-only">Contraseña</div>
		<input type="password" name="password" id="password" class="form-control" placeholder="Crea una contraseña" maxlength="60">
		<div class="label sr-only">Escribe de nuevo tu contraseña</div>
		<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Escribe de nuevo tu contraseña" maxlength="60">
		<button id="btn-activate-acc" class="btn btn-lg btn-primary btn-block">Activar cuenta</button>
		<div id="status"></div>
	</form>
</div>
<footer class="footer">
	<div class="container">
		<small>Dashboard v.2.0.0</small>
	</div>
</footer>
</body>
</html
