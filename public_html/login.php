<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	// If user is logged in, send him to his profile page
	if($user_ok == true){
		header("location: http://vidaingles.com/usuario/".$_SESSION["username"]);
		exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Iniciar sesión en Vida Inglés</title>
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="msg"></div>
		<div id="wrap">
			<header id="header-wrap" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><?php echo $log_user_pic ?><span class="caret"></span><span class="sr-only">Toggle navigation</span>
						</button>
						<img class="logo" src="<?php echo home()?>/i/vidaingles-logo50x50.png" width="25" height="25" alt="Vida Inglés"/><a class="navbar-brand" href="<?php echo home()?>">Vida Inglés</a>
					</div><!-- Ends navbar-header -->
					<?php //include_once('vi_templates/vi_template_login_links.php') ?>
				</div><!--Ends container -->
			</header>
			<!-- Ends header ========
			=======================================-->
			<div class="container">
				<div id="pageMiddle">
					<!-- LOGIN FORM -->
					<form id="loginform" class="form-signin" role="form">
						<h2 class="form-signin-heading">Iniciar sesi&oacute;n</h2>
						<div class="label sr-only">Correo electr&oacute;nico:</div>
						<input type="text" id="email" class="form-control" placeholder="Correo electrónico" maxlength="88" autofocus />
						<div class="label sr-only">Contraseña</div>
						<input type="password" id="password" class="form-control" placeholder="Contraseña" maxlength="100">
						<button id="btn-signin" class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>
						<div id="status"></div>
						<div class="small text-login">&iquest;No tienes una cuenta? <a href="<?php echo home() ?>/registrar">Regístrate</a> <br /><a href="forgotpass.php">&iquest;Olvidaste tu contraseña?</a></div>
					</form>
					<!-- LOGIN FORM -->
				</div>
			</div>
		</div>
		<footer class="footer-fixed">
			<div class="container">
				<div class="microdata">
					<a href="<?php echo home(); ?>">&copy; <?php echo date('Y'); ?><span itemscope itemtype="http://schema.org/Organization"> <span itemprop="name">Vida Inglés</span></a>
					</div><!-- Ends microdata -->
				</div>
			</footer>
			<script src="js/ie10-viewport-bug-workaround.js"></script>
			<?php include_once('includes/ga.php') ?>
		</body>
	</html>