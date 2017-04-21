<?php

use database\Db;

include "classes/DB.php";

$msg = null;

if(!empty($_POST)){

    $u = $_POST['username'];
    $p = $_POST['password'];

		//Check of username exists in database
    if(DB::getRow('SELECT estud_username FROM cetec.estudiantes WHERE estud_username = :u',['u'=>$u])){

    	//Check if password exists
    	if (password_verify($p, DB::getRow('SELECT estud_pass FROM cetec.estudiantes WHERE estud_username=:u', [':u'=>$u])[0]['estud_pass'])) {
    		echo 'Logged in!';

        $crypt_strong = True;
    		$token = bin2hex(openssl_random_pseudo_bytes(64,$crypt_strong));

    		$stud_id = DB::getRow('SELECT estud_id FROM cetec.estudiantes WHERE estud_username = :u',[':u'=>$u])[0]['estud_id'];

    		DB::insertRow('INSERT INTO cetec.login_tokens VALUES (\'\',:token,:estud_id)',[':token'=>sha1($token), ':estud_id'=>$stud_id]);

    		setcookie("CETECID",$token, time() + 60 * 60 * 24 * 7,'/',NULL,NULL,TRUE);
				setcookie("CETECID_",'1', time() + 60 * 60 * 24 * 3,'/',NULL,NULL,TRUE);

    	} else {
    		echo 'Incorrect Password!';
    	}
    } else {
    	$msg = "<span class='text-danger'><strong>Nombre de usuario no existe!</strong></span>";
    }

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
    <form method="post" action="login.php" id="loginform" class="form-signin" role="form">
        <div><?php echo $msg; ?></div>
        <h2 class="form">Iniciar sesión</h2>
        <div class="label sr-only">Username</div>
        <input type="text" name="username" id="username" class="form-control" placeholder="Correo electrónico" maxlength="88" autofocus/>
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

