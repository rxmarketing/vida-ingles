<?php
	include('functions.php');
?>
<!DOCTYPE HTML>
<html lang="en" translate="no">
	<head>
		<title>Vida Inglés App</title>
		<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="fb:app_id" content="382987081744830" />
		<meta property="fb:admins" content="1335978648" />
    <meta property="og:url"           content="<?php echo canonical() ?>"/>
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Vida Inglés" />
    <meta property="og:description"   content="Prepárate para tus exámenes de Inglés." />
    <meta property="og:image"         content="" />
		<meta name="keywords" content="examen, examenes, exámenes, preparar, preparación, prepararme, prepárate, clases ingles, lecciones ingles, vida ingles" />
    <meta name="description" content="Prepárate para tus exámenes de Inglés.">
    <meta name="author" content="Ricardo Maldonado">
		<link rel="canonical" href="<?php echo canonical() ?>" />
		<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" href="css/jquery-ui.min.css"/>
		<link rel="stylesheet" href="css/app_styles.css" media="screen" />
		<link rel="stylesheet" href="css/app_print_styles.css" media="print" />
	</head>
	<body>
		<!-- TOP HEADER ====================================================================== -->
		<?php include_once('includes/template_top_navbar.php') ?>
		<!-- CONTENT ==================================================================== -->
		<div class="container">
			<div class="row">
				<div class="col-md-9 marketing">
					<section>
						<h1>Ejercicios</h1>
						<h3></h3>
						


<p></p>
    <h2>The best aplication for teachers and students.</h2>
    
    <div class="fb-quote"></div>
						<?php include_once('includes/nav-links.php') ?>
					</section>
				</div>
				<div class="col-md-3 marketing">
				</div>
				<div class="fb-share-button" data-href="<?php echo canonical() ?>" data-layout="button_count"></div>
    
    
			</div>
		</div><!-- Ends container -->
		<!-- FOOTER =========================================================================== -->
		<?php include('includes/template_footer.php') ?>
		<?php include('includes/fb_sdkk.php') ?>
	</body>
</html>