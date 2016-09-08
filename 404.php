<?php 
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	$referer = (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:"No existe referente";
	
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>404 File not found</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="<?php echo $song_name ?>" />
		<meta property="og:description" content="" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="" />
		<link rel="canonical" href="" />
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script>
			$(function () {
				$('[data‐toggle="popover"]').popover()
			})
		</script>
		
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1>No encuentro la página</h1>
					<h3></h3>
					<div class="metadata">
						<span class="cef"></span>
					</div>
					<h1>Referer: <?php echo $referer ?></h1>
					
					<h3 class="bg-danger text-danger text-center">The page <code><?php echo canonical() ?></code> doesn't exists or isn't available. <br /><br /><span class="tradu">La página <code><?php echo canonical() ?></code> no existe o no está disponible.</span><br /></h3>
					
					<div class="col-md-12 ads">
						<?php include_once('ads/ad_responsive.php')?>
					</div>
				</div><!-- Ends col-md-8 -->
				<!-- SIDE BAR 
				======================================================-->
				<div class="col-md-4">
					<?php include_once('templates/template_sidebar_right.php')?>
				</div><!--Ends col-md-4 -->
			</div>
		</div>
		<!--- FOOTER ======================================================-->
		<footer class="footer">
			<div class="container">
				<?php include_once('templates/template_footer.php') ?>
			</div>
		</footer>
	</body>
</html>