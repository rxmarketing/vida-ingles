<?php

use database\Db;
use entrar\Login;
include "classes/DB.php";
include "classes/Login.php";

$changePassMsg = null;

if(Login::isLoggedIn()){
	
	if(!empty($_POST)){
		
		$oldpassword = $_POST['opassword'];
		$npassword = $_POST['npassword'];
		$cpassword = $_POST['cpassword'];
		
		// Checks if old password exists in db
		if (password_verify($oldpassword, DB::getRow('SELECT estud_pass FROM cetec.estudiantes WHERE estud_id=:estudid', [':estudid'=>Login::isLoggedIn()])[0]['estud_pass'])){
			
			// Checks if new passwords match
			if($npassword == $cpassword) {	
				
				// Checks for new password length
				if(strlen($npassword) >= 6 && strlen($npassword) <= 60){
					
					DB::query('UPDATE cetec.estudiantes SET estud_pass = :npass WHERE estud_id = :loggedid',['npass'=>password_hash($npassword, PASSWORD_BCRYPT), ':loggedid'=>Login::isLoggedIn()]);
					
					$changePassMsg = '<span class="text-success"><strong>Has cambiado tu contraseña!</strong></span>';
				
				} else {
					$changePassMsg = '<span class="text-danger"><strong>Contraseña debe tener de 6 a 60 caracteres alfanuméricos.</strong></span>';
				}
			} else {
				$changePassMsg = '<span class="text-danger"><strong>Las contraseñas no son iguales!</strong></span>';
			}
		} else {
			$changePassMsg = '<span class="text-danger"><strong>Contraseña actual incorrecta!</strong></span>';
		}
	}
	
} else {
	die('Not logged In :(');
}
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
	<form method="post" action="changepass.php" id="changepassFrm" name="changepassFrm" class="form-signin" role="form">
		<h2 class="">Cambiar contraseña</h2>
		<div id="changepass-msg"><?php echo $changePassMsg ?></div>
		<label for="opassword" id="" class="control-label">Contraseña actual</label>
		<input type="password" name="opassword" id="opassword" size="20" autocomplete="off" class="form-control data" placeholder="Contraseña actual" autofocus/>
		<label for="npassword" id="" class="control-label">Nueva contraseña</label>
		<input type="password" name="npassword" id="npassword" size="20" autocomplete="off" class="form-control data" placeholder="Escribe nueva contraseña" autofocus/>
		<div id="cpasswordaviso"></div>
		<label for="cpassword" id="cpasswordLabel" class="control-label">Escribe otra vez contraseña</label>
		<input type="password" name="cpassword" id="cpassword" size="20" autocomplete="off" class="form-control data" placeholder="Escribe contraseña otra vez"/>
		<button id="btn-changepass" class="btn btn-lg btn-primary btn-block">Cambiar contraseña</button>
		
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