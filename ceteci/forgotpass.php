<?php
	
use database\DB;

include 'classes/DB.php';

$forgotpass_msg = False;

if(isset($_POST['resetpassword'])){
	
	$email = $_POST['email'];
	$cstrong = True;
	$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
	
	//Fetch estud_id of the email provided
	$studid = DB::getRow('SELECT estud_id FROM cetec.estudiantes WHERE estud_email = :e',[':e'=>$email])[0]['estud_id'];
	
	//Insert token into password_token table
	DB::insertRow('INSERT INTO cetec.password_tokens VALUES (\'\', :tok, :estudid)',[':tok'=>sha1($token),':estudid'=>$studid]);
	
	//Echo message
	$forgotpass_msg = '<span class="text-warning"><strong>Revisa tu correo electrónico para terminar de restablecer tu contraseña!</strong></span>';
	
	echo $token;
}




?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Olvidé contraseña</title>
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

        <form method="post" action="forgotpass.php" id="forgotpassFrm" name="forgotpassFrm" class="form-signin" role="form">
            <h2 class="">Olvidé contraseña</h2>
            <div id="forgotpass-msg"><?php echo $forgotpass_msg ?></div>
            <label for="email" class="control-label">Escribe tu correo electrónico</label>
            <input type="text" name="email" id="email" size="20" autocomplete="off" class="form-control" placeholder="Correo electrónico"/>
            <input type="submit" name="resetpassword" value="Restablecer contraseña">

            <div class="small"></div>
        </form>

        <footer class="footer">
            <div class="container">
                <small>&copy; <?php echo date('Y'); ?> - Dashboard v.2.0.0</small>
            </div>
        </footer>
    </body>
</html>