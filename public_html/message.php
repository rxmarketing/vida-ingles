<?php
	$message = "";
	$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
	if($msg == "activation_failure"){
		$message = '<div class="bg-danger text-danger"><h3>Error en la activacion.</h3>
		<p>	Los siento, hubo un error al tratar de activar tu cuenta. Se nos ha notificado sobre este problema y nos pondremos en contacto contigo por email cuando se resuelva.</p>';
		} else if($msg == "activation_success"){
		$message = '<div class="text-success bg-success"><h2>&iexcl;Enhorabuena!</h2> <p>Tu cuenta en Vida Inglés ha sido activada. <a href="../login.php">Clic aqui para iniciar sesión</a></p></div>';
		} else {
		$message = $msg;
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Vida Inglés Activación de cuenta</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/vi_core.css"/>
		<script async src="../js/jquery-1.11.3.min.js"></script>
		<script async src="../js/bootstrap.min.js"></script>
		<script async src="../js/vidaingles.js"></script>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header id="header-wrap" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<?php //echo $log_user_pic .'<span class="caret"></span>' ?>
						<span class="sr-only">Toggle navigation</span>
					</button>
					<a class="navbar-brand" href="#">Vida Ingl&eacute;s</a>
				</div><!-- Ends navbar-header -->
				<?php //include_once('vi_templates/vi_template_login_links.php') ?>
			</div><!--Ends container -->
		</header>
		<!-- Ends header ========
		=======================================-->
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="form" role="form">
						<h1 class="form-heading"></h1>
						<h4 class="form-subheading"></h4>
						<?php echo $message; ?>
					</div>
				</div>
			</div>
			<!--- FOOTER
			======================================================-->
			<div class="container" id="register-footer">
				<div class="row">
					<div class="col-md-12">
						<div class="microdata">
							<a href="<?php echo "http://vidaingles.com"; ?>">&copy; <?php echo date('Y'); ?><span itemscope itemtype="http://schema.org/Organization"></span> <span itemprop="name"><?php echo "Vida Ingles" ?></span></a>
						</div><!-- Ends microdata -->
					</div>
				</div>
			</div>
		</div>
	</body>
</html>			