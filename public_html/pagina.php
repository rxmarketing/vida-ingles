<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	if(isset($_GET["id"])){
		$pageid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
    header("location: login.php");
    exit();	
	}
	$sql = "SELECT * FROM paginas WHERE pageid=$pageid LIMIT 1";
	$qry = mysqli_query($db_conx,$sql);
	while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
		$page_id = $row['pageid'];
		$page_title = $row['pagetitle'];
		$pagina_contenido = $row['pagecontent'];
		$paginaguid = $row['pagina_guid'];
		$paginafriendlyname = $row['friendlytitle'];
		$pagina_canonical = 'http://vidaingles.com/paginas/'.$page_id.'/'.$paginafriendlyname;
		$page_excerpt = strip_tags(substr($page_content,0,230).'...');
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../../favicon.ico">
		<title><?php echo $page_title ?></title>
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="<?php echo $page_title ?>" />
		<meta property="og:description" content="<?php echo $page_excerpt ?>" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="" />
		<link rel="canonical" href="<?php echo $pagina_canonical ?>" />
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<style type="text/css">
			select {
			width: 300px   
			}
		</style>
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- SHOWCASE =======================================================-->
		<?php echo $showcase ?>
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1>P&aacute;ginas</h1>
					<h3 title="Clases y Asesorías de Inglés en Mérida Yucatán"><?php echo $page_title ?></h3>
					<!-- <div class="metadata">
						<span class=""></span>
					</div> -->
					<?php echo $pagina_contenido ?>
					<div class="col-md-12 ads">
						<?php include_once('ads/ad_responsive.php')?>
					</div>
				</div><!-- Ends col-md-8 -->
				<!-- SIDE BAR 
				======================================================-->
				<div class="col-md-4" id="right-sidebar">
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