<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["id"])){
		//$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
		$courseid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
    header("location: vi_login.php");
    exit();	
	}
	
	// fetch one course to display
	$sql = "SELECT cursos.courseid, cursos.coursename AS Curso, cursos.coursedesc AS Descripcion, categorias.catname AS Category, cursos.cefdesc, cursos.competences, cursos.courseweeks, cursos.course_price AS Precio, cursos.course_hours_week AS 'Horas Semana', cursos.price_per_hour AS 'Precio Hora', cursos.temario_id, cursos.lastmodified
	FROM cursos
	INNER JOIN categorias
	ON cursos.course_cat_id = categorias.catid
	WHERE cursos.courseid ='$courseid'
	LIMIT 1
	";
	$course_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($course_query, MYSQLI_ASSOC)) {
		$course_id = $row["courseid"];
		$coursename = $row["Curso"];
		$course_desc = $row["Descripcion"];
		$coursecat = $row["Category"];
		$cef_desc = $row["cefdesc"];
		$competences = $row["competences"];
		$course_weeks = $row["courseweeks"];
		$course_hrs_week = $row["Horas Semana"];
		$course_price_hour = $row["Precio Hora"];
		$temario_id = $row["temario_id"];
		$total_hours = $course_hrs_week * $course_weeks;
		$total_price = $total_hours * $course_price_hour;
		$weekly_price = $course_hrs_week * $course_price_hour;
		$forknight_price = 8 * $course_price_hour;
	}
    //BUILD THE LINK TO THE TEMARIO
    $temario_link = '<a class="btn btn-primary" href="'.$domain.'/temario.php?temario_id='.$temario_id.'">Ver temario &raquo;</a>';
setlocale(LC_MONETARY,"es_MX");
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Curso <?php echo $coursename ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="<?php echo $coursename ?>" />
		<meta property="og:description" content="<?php //echo ?>" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="" />
		<link rel="canonical" href="<?php echo canonical(); ?>" />
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
					<h1>Cursos</h1>
					<h3 id="exam-name"><?php echo $coursename ?></h3>
					<div class="metadata">
						<span class="cef">CEF: <a href="pagina.php?id=1" class=""><?php echo $cef_desc ?></a> &nbsp;|&nbsp;Categor&iacute;a: <?php echo $coursecat ?> &nbsp;|&nbsp;Semanas: <?php echo $course_weeks . ' ('. $course_hrs_week .'-hrs/sem)' ?> &nbsp;|&nbsp;<span class="text-success"><strong>Pago quincenal: <?php echo money_format("%i", $forknight_price . "\n"); ?></strong></span></span>
					</div>
					<?php echo $course_desc ?>
					<?php echo $competences ?>
					<a class="btn btn-primary" href="<?php echo home() ?>/contacto" role="button">Solicita m&aacute;s informaci&oacute;n &raquo;</a>
                    <?php echo $temario_link; ?>
					<?php include_once('ads/ad_responsive.php')?>
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