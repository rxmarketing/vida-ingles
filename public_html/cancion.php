<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	if(isset($_GET["id"])){
		$songid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
    header("location: vi_login.php");
    exit();	
	}
	$song_name = "";
	$song_lyrics = "";
	$song_group = "";
	$song_album = "";
	$sql = "SELECT * FROM canciones WHERE songid='$songid' LIMIT 1";
	$qry = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)) {
		$song_id = $row['songid'];
		$song_name = $row['songname'];
		$song_group = $row['songgroup'];
		$song_album = $row['songalbum'];
		$song_lyrics = $row['songlyrics'];
		$song_link = $row['songlink'];
		$song_friendlyname = $row['songfriendlyname'];
		$song_guid = $row['song_guid'];
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Canción <?php echo $song_name ?></title>
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
		<link rel="canonical" href="<?php echo $song_guid ?>" />
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- SHOWCASE =======================================================-->
		<?php echo $showcase ?>
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1>Canciones</h1>
					<h3><?php echo $song_name ?></h3>
					<div class="metadata">
						<span class="cef">Grupo: <?php echo $song_group ?> | Album: <?php echo $song_album ?></span>
					</div>
					<div id="lyrics">
						<audio src="<?php echo home() ?>/audio/<?php echo $song_link ?>" controls></audio>
						<?php echo $song_lyrics ?>
						<button id="showHiddenWordBtn"></button>
					</div>
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