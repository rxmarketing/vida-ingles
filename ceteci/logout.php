<?php
	
use database\Db;
use entrar\Login;

include './classes/DB.php';
include './classes/Login.php';

if(!Login::isLoggedIn()){
	die('No has iniciado sesión.');
}

if(isset($_POST['btn-confirm-logout'])){
	
	if(isset($_POST['alldevices'])){
		
		DB::insertRow('DELETE FROM cetec.login_tokens WHERE estud_id = :eid', [':eid'=>Login::isLoggedIn()]);
	
	} else {
		if(isset($_COOKIE['CETECID'])){
			DB::insertRow('DELETE FROM cetec.login_tokens WHERE token = :tok', [':tok'=>sha1($_COOKIE['CETECID'])]);
		}
		setcookie('CETECID', '1', time() - 3600);
		setcookie('CETECID_', '1', time() - 3600);
	}

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Logout</title>
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
    <form method="post" action="logout.php" id="loginform" class="form-signin" role="form">
        
        <h2 class="form">Cerrar sesión</h2>
        <h6 class="form">¿Estas seguro que quieres cerrar sesión?</h6>
        <div class="form-check">
							<label class="form-check-label"><input type="checkbox" name="alldevices" class="form-check-input" id="alldevices" value="alldevices"/> Cerrar sesión en todos mis dispositivos</label>
						</div>
        <input type="submit" name="btn-confirm-logout" value="Confirmar"/>
        <div id="status"></div>
    </form>
</div>
<footer class="footer">
    <div class="container">
        <small>Dashboard v.2.0.0</small>
    </div>
</footer>
</body>