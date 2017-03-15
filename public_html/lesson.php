<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["id"])){
		$lessonid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
    header("location: login.php");
    exit();	
	}
		$ejercicioFriendNam = "";
		$lesson_coursename = "";
		//Fetch the lesson from DB table
	$sql = "SELECT * FROM lecciones WHERE lessonid='$lessonid' AND ispublished='1' LIMIT 1";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$lesson_id = $row["lessonid"];
		$lesson_level = $row["lessonlevel"];
		$lesson_courseid = $row["lesson_courseid"];
		$lesson_cef = $row["lessoncef"];
		$lesson_author = $row["lessonauthor"];
		$lesson_title = $row["lessontitle"];
		$lesson_page_title = strip_tags($lesson_title);
		$lesson_content = "Gramatica: ". $row["lessoncontent"];
		$lesson_content = convertHashtags($lesson_content);
		$lessonexcerpt = strip_tags(substr($lesson_content, 0, 230). '...');
		$lesson_image_name = $row['lesson_image'];
		$lesson_image_canonical = $domain.'/i/'.$lesson_image_name;
		$lesson_image = '<img class="img-circle content-image" src="'.$lesson_image_canonical.'" width="150" height="150" title="'.$lesson_page_title.'" alt="'.$lesson_page_title.'"/>';
		$test_id = $row["testid"];
		$lessonguid = $row["lesson_guid"];
		$lessonfriendlyname = $row["lesson_name"];
		$lesson_canonical = $domain.$lesson_id.'/'.$lessonfriendlyname;
		$date_published = $row["datepublished"];
		$date_modified = $row["datemodified"];
		// FETCH THE COURSE NAME AND COURSE FRIENDLY NAME FOR THE LESSON FROM CURSOS TABLE
		$qry = "SELECT coursename, curso_friendly_name FROM cursos WHERE courseid='$lesson_courseid'";
		$res = mysqli_query($db_conx,$qry);
		while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
			$cursoName = $row['coursename'];
			$cursoFriendlyName = $row['curso_friendly_name'];
		}
		// BUILD THE CURSO LINK
		$coursename_link = '<a href="'.$domain.'/cursos/'.$lesson_courseid.'/'.$cursoFriendlyName.'" title="Curso: '.$cursoName.'">Curso: '.$cursoName.'</a>';
		//Fetch ejercicio friendly name FROM EJERCICIOS TABLE AND ASSIGN IT TO $ejercicioFriendNam VARIABLE
		$qry = "SELECT ejer_friendly_name FROM ejercicios WHERE ejer_id='$test_id' LIMIT 1";
		$ejerFriendName = mysqli_query($db_conx,$qry);
		while ( $row = mysqli_fetch_array($ejerFriendName,MYSQLI_ASSOC)) {
			$ejercicioFriendNam = $row['ejer_friendly_name'];
		}
	}
	include('templates/keywords.php');
	// BUILD THE "HAZ EL EJERCICIO" BUTON LINK
	if($test_id==FALSE){
		$do_excersise_btn = '<p><a class="btn btn-default">No hay ejercicio de <em>'.$lesson_page_title.'</em> por el momento.</a></p>';
		} else {	
		$do_excersise_btn = '<p><a class="btn btn-primary" href="'.$domain.'/ejercicios/'.$test_id.'/'.$ejercicioFriendNam.'">Haz el ejercicio '.$lesson_page_title.'</a></p>';
	}
	//Fetch tags for the lesson AND ASSIGN IT TO THE $lesson_tag_name VARIABLE
		$lesson_tag_list = "";
		$lesson_tag_name = "";
		$sql = "SELECT tag_name FROM etiquetas WHERE lesson_id = '$lessonid'";
		$qry = mysqli_query($db_conx,$sql);
		while ($row = mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
			$lesson_tag_name .= '<li>'.$row['tag_name'].'</li>';
		}
?>
<!doctype html>
<html lang="es">
	<head>
		<title>Leccion <?php echo $lesson_page_title ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../../favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="<?php echo $keywords ?>" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="<?php echo $lesson_page_title ?>" />
		<meta property="og:description" content="<?php echo $lessonexcerpt ?>" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="<?php echo $lesson_image_canonical ?>" />
		<link rel="canonical" href="<?php echo $lesson_canonical ?>" />
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
					<h1 class="mute ucase-text">Lecciones de Inglés</h1>
					<article>
					<div itemscope itemtype="http://schema.org/BlogPosting">
						<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo $lesson_canonical ?>"/>
						<h3 itemprop="headline" id="exam-name"><?php echo $lesson_title ?></h3>
						<div class="metadata"><span class="cef">Publicado: <abbr class="timeago" title="<?php echo $date_published;?>"><?php echo $date_published;?></abbr></span>
							<span class="cef" itemprop="author" itemscope itemtype="https://schema.org/Person">Por: <span itemprop="name">Ricardo Maldonado</span></span>
							<span class="cef">CEF: <a href="<?php echo home() ?>/paginas/1/marco-comun-europeo"><?php echo $lesson_cef ?></a> &nbsp;|&nbsp; <?php echo $coursename_link ?></span>
						</div>
						<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<img src="<?php echo $lesson_image_canonical ?>" class="img-responsive thumbnail"/>
							<meta itemprop="url" content="<?php echo $lesson_image_canonical ?>">
							<meta itemprop="width" content="800">
							<meta itemprop="height" content="800">
						</div>
						<span itemprop="description"><?php echo $lesson_content ?></span>
						<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
							<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
								<img src=""/>
								<meta itemprop="url" content="<?php echo home() ?>/i/vidaingles-logo50x50">
								<meta itemprop="width" content="600">
								<meta itemprop="height" content="60">
							</div>
							<meta itemprop="name" content="Vida Inglés">
						</div>
						<meta itemprop="datePublished" content="<?php echo $date_published ?>"/>
						<meta itemprop="dateModified" content="<?php echo $date_modified ?>"/>
					</div><!-- ENDS ITEMSCOPE -->
					<hr class="featurette-divider">
					<div class="cef">Actualizado: <abbr class="timeago" title="<?php echo $date_modified;?>"><?php echo $date_modified;?></abbr></div>
					<hr class="featurette-divider noprint">
					<ul id="etiquetas" class="list-inline noprint">
					<span class="glyphicon glyphicon-tags" aria‐hidden="true"></span>
					<?php echo $lesson_tag_name ?>
					</ul>
					</article>
					<?php echo $do_excersise_btn ?>
					<hr class="featurette-divider noprint">
					<?php include_once('includes/recommended_test.php')?>
					<?php include_once('ads/ad_responsive.php')?>
				</div>
				<!-- ENDS MAIN CONTENT
				====================================================== -->
				<!-- SIDE BAR 
				======================================================-->
				<div class="col-md-4 noprint">
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