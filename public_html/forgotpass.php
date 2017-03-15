<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	if($user_ok == true){
		header("location: usuario/".$_SESSION["username"]);
		exit();
    }
	// EMAIL LINK CLICK CALLS THIS CODE TO EXECUTE
	if(isset($_GET['u']) && isset($_GET['p'])){
		$u = mysqli_real_escape_string($db_conx,$_GET['u']);
		$temppasshash = mysqli_real_escape_string($db_conx, $_GET['p']);
		if(strlen($temppasshash) < 128){
            echo "Password lenght issues.";
			exit;
        }
		$consulta = $db_conx->query("SELECT userid FROM usuarios WHERE username='$u' AND temp_pass='$temppasshash' LIMIT 1");
		//$result = $consulta->get_result();
		$rowCount = $consulta->num_rows;
		
		if($rowCount == 0){
			header("location: message.php?msg=no_exist");
			exit;
			} else { 
			while($row = $consulta->fetch_assoc()){
				$id = $row['userid'];
            }
            //SET password field to temporary password
            $consulta = $db_conx->prepare('UPDATE usuarios SET password=? WHERE userid=? AND username=? LIMIT 1');
            if(!$consulta){
                echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
                echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
                exit; 
            }
            $consulta->bind_param('sds',$temppasshash,$id,$u);
            $consulta->execute();
            $affectedRows = $consulta->affected_rows;
            if($affectedRows == FALSE ){
                echo "Could not update password column.";
                exit;
            }
            //SET temp_pass to nothing
            $consulta1 = $db_conx->prepare("UPDATE usuarios SET temp_pass='' WHERE username='$u' LIMIT 1");
            if(!$consulta1){
                echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
                echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
                exit; 
            }
            $consulta1->execute();
			$affectedRows = $consulta1->affected_rows;
            if($affectedRows == FALSE ){
                echo "Could not update temp_pass column.";
                exit;
            }
			header("location: $domain/iniciar");
			//exit();
        }
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Olvidé contraseña | Vida Inglés</title> 
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/vi_core.css"/>	
		<script async src="js/jquery-1.11.3.min.js"></script>
		<script src="js/forgotpass.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
	<body>
		<header id="header-wrap" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div id="msg"></div>
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="sr-only">Toggle navigation</span>
                    </button> <a class="navbar-brand" href="/">Vida Inglés</a>
                </div><!-- Ends navbar-header -->
            </div><!--Ends container -->
        </header>
		<!-- Ends header ========
        =======================================-->
		<div class="container">
			<form id="forgotpassFrm" class="form-signin" role="form">
                <h2 class="form-signin-heading">Contrase&ntilde;a temporal</h2>
                <label for="email" id="paso1" class="control-label">Paso 1: Escribe tu correo electr&oacute;nico</label>
                <input type="email" id="email" name="email" class="form-control data" placeholder="Escribe tu correo electr&oacute;nico" maxlenght="88" autofocus=""/>
                <label for="email" id="paso2" class="control-label">Paso 2: Revisa tu bandeja de entrada en unos minutos.</label>
                <button id="btn-forgotpass" class="btn btn-lg btn-primary btn-block" type="submit">Genera una contrase&ntilde;a temporal</button> 
                <div id="aviso"></div>
                <div id="sm_textlogin" class="small text-login"> <br /><a href="<?php echo home() ?>/iniciar">Inicia sesi&oacute;n</a>
                </div>
            </form>
        </div>
		<!--- FOOTER 
        ======================================================-->
        <footer class="footer-fixed">
            <div class="container">
                <div class="microdata">
                    <a href="index.php">&copy; <?php echo date('Y'); ?><span itemscope itemtype="http://schema.org/Organization"> <span itemprop="name">Vida Inglés</span></a> 
                    </div><!-- Ends microdata -->
                </div>
            </footer>
            <script src="js/ie10-viewport-bug-workaround.js"></script>
            <?php include_once('includes/ga.php') ?>
			
        </body>
    </html>	            