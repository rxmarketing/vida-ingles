<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
?>
<!doctype html>
<html lang="es">
	<head>
		<title>Vida Inglés | Prepárate para tus exámenes</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />
		<meta property="fb:admins" content="1335978648" />
		<meta property="og:url" content="<?php echo canonical(); ?>"/>
		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:type" content="Website" />
		<meta property="og:image" content="" />
		<link rel="canonical" href="<?php echo canonical(); ?>" />
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<link href="css/carousel.css" rel="stylesheet">
	</head>
	<body>
		<div id="msg" style="margin-top:15px;"></div>
		<div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
							</button>
              <a class="navbar-brand" href="<?php echo home() ?>">Vida Inglés</a>
						</div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo home() ?>">Inicio</a></li>
								<li><a href="<?php echo home()?>/verbos">Verbos</a></li>
								<li><a href="<?php echo home() ?>/paginas/4/formulas-de-ingles">Sintáxis</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo home()?>/lecciones">Lecciones</a></li>
                    <li><a href="<?php echo home()?>/ejercicios">Ejercicios</a></li>
                    <li><a href="#">Canciones</a></li>
                    <li><a href="#">Cursos</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header"></li>
										<li><a href="<?php echo home() ?>/contacto">Contact</a></li>
										<li><a href="http://vidaingles.com/registrar">Regístrate</a></li>
									</ul>
								</li>
							</ul>
							<?php include_once('templates/template_login_links.php') ?>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<!-- Carousel
		================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
			</ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="" alt="Curso Ingl&eacute;s Elemental">
          <div class="container">
            <div class="carousel-caption">
              <h1>Curso de Ingl&eacute;s Elemental</h1>
							<h3>Nivel A - Usuario B&aacute;sico</h3>
							<small>Abarca los niveles A1 y A2 del Marco Com&uacute;n Europeo (CEF)</small>
							
							<h4>A1 Acceso (90 horas de estudio)</h4>
							<h4>A2 Plataforma (180-200 horas de estudio)</h4>
							<br />
              <p><a class="btn btn-lg btn-primary" href="<?php echo home() ?>/cursos/1/ingles-elemental" role="button">Ver detalles &raquo;</a></p>
						</div>
					</div>
				</div>
        <div class="item">
          <img class="second-slide" src="" alt="Curso Ingl&eacute;s Pre-Intermendio">
          <div class="container">
            <div class="carousel-caption">
              <h1>Curso de Ingl&eacute;s Pre-Intermedio</h1>
							<h3>Nivel B1 - Usuario Independiente</h3>
							<small>Abarca el nivel B1 del Marco Com&uacute;n Europeo (CEF)</small>
							
							<h4>B1 Umbral (350-400 horas de estudio)</h4>
							<br />
              <p><a class="btn btn-lg btn-primary" href="<?php echo home() ?>/cursos/2/ingles-preintermedio" role="button">Ver detalles &raquo;</a></p>
						</div>
					</div>
				</div>
        <div class="item">
          <img class="third-slide" src="" alt="Curso Ingl&eacute;s Intermedio">
          <div class="container">
            <div class="carousel-caption">
              <h1>Curso de Ingl&eacute;s Intermedio</h1>
							<h3>Nivel B2 - Usuario Independiente</h3>
							<small>Abarca el nivel B2 del Marco Com&uacute;n Europeo (CEF)</small>
							
							<h4>B2 Avanzado (500-600 horas de estudio)</h4>
							<br />
							
              <p><a class="btn btn-lg btn-primary" href="<?php echo home() ?>/cursos/3/ingles-intermedio" role="button">Ver detalles &raquo;</a></p>
						</div>
					</div>
				</div>
				<div class="item">
          <img class="fourth-slide" src="" alt="Asesor&iacute;a Personalizada">
          <div class="container">
            <div class="carousel-caption">
              <h1>Cursos y Asesoría <span class="text-muted">Personalizada</span></h1>
              <small>Secundaria &middot; Prepa &middot; Profesional</small>
              <p class="lead">Vienes con nosotros o vamos contigo.</p>
              <p><a class="btn btn-lg btn-primary" href="<?php echo home() ?>/contacto" role="button">Solicita M&aacute;s Info Ahora Mismo &raquo;</a></p>
						</div>
					</div>
				</div>
				<div class="item">
          <img class="fifth-slide" src="" alt="Fifth slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Vida Ingl&eacute;s</h1>
              <p class="lead">Prepárate Para Tus Exámenes</p>
							<small>Lecciones &middot; Ejercicios &middot; Canciones &middot; Cursos</small>
							<br />
							<br />
              <p><a class="btn btn-lg btn-primary" href="<?php echo home() ?>/registrar" role="button">Reg&iacute;strate Ahora Mismo <small>es gr&aacute;tis</small> &raquo;</a></p>
						</div>
					</div>
				</div>
			</div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
			</a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
			</a>
		</div><!-- /.carousel -->
		
		<!-- Marketing messaging and featurettes
		================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->
		<div class="container marketing">
			<!-- Three columns of text below the carousel -->
			<div class="row">
				<?php echo $recent_lessons ?>
				<div class="text-center"><a href="<?php echo home() ?>/lecciones">Ver lista de lecciones de Ingles</a></div>
			</div><!-- /.row -->
			<!-- START THE FEATURETTES -->
      <?php echo $featured_tests ?>
			<hr class="featurette-divider">
      <!-- /END THE FEATURETTES -->
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <p>&copy; <?php echo date('Y') ?> Vida Inglés &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</footer>
		</div><!-- /.container -->
	</body>
</html>