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
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Cetec</title>
</head>
<body>
<form method="post" action="php/php_cetec_login.php" id="loginform" class="form-signin" role="form">
	<h2 class="form">Iniciar sesi&oacute;n</h2>
	<div class="label sr-only">Correo electr&oacute;nico:</div>
	<input type="text" name="email" id="email" class="form-control" placeholder="Correo electrónico" maxlength="88" autofocus/>
	<div class="label sr-only">Contraseña</div>
	<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" maxlength="100">
	<button id="btn-signin" class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>
	<div id="status"></div>
</form>
</body>
</html>
