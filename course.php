<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	setlocale(LC_MONETARY, 'es_MX');
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["id"])){
		//$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
		$courseid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
        header("location: login.php");
        exit();	
    }
	
	// fetch one course to display
	$sql = "SELECT cursos.courseid, cursos.coursename AS Curso, cursos.coursedesc AS Descripcion, categorias.catname AS Category, cursos.cefdesc, cursos.competences, cursos.total_units, cursos.hours_per_unit, cursos.incluye, cursos.hours_per_week, cursos.price_per_hour AS 'Precio Hora', cursos.temario_id, cursos.lastmodified
	FROM cursos
	INNER JOIN categorias
	ON cursos.course_cat_id = categorias.catid
	WHERE cursos.courseid ='$courseid'
	LIMIT 1
	";
    
	$course_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($course_query, MYSQLI_ASSOC)) {
		$course_id = $row["courseid"];
		$temario_id = $row["temario_id"];
		$coursename = $row["Curso"];
		$course_desc = $row["Descripcion"];
		$coursecat = $row["Category"];
		$cef_desc = $row["cefdesc"];
		$competences = $row["competences"];
        $incluye = $row["incluye"];
		$total_units = $row["total_units"];
		$hours_per_unit = $row["hours_per_unit"];
		$hours_per_week = $row["hours_per_week"];
		$course_price_hour = $row["Precio Hora"];
        // PAYMENT LOGIC ============================
        $total_hours = $hours_per_unit * $total_units;
        $total_weeks = $total_hours / $hours_per_week;
        $weeks_per_unit = $total_weeks / $total_units;
        $hours_per_forknight = $hours_per_week * 2;
        $hours_per_month = $hours_per_week * 4;
        $total_price = $total_hours * $course_price_hour;
        $monthly_payment = $course_price_hour * $hours_per_month;
        $forknightly_payment = $course_price_hour * $hours_per_forknight;
        $weekly_payment = $course_price_hour * $hours_per_week;
        // -------------------------------------------------------
        
        // DISCOUNTS LOGIC
        //switch($payment_plan){
        //    case 1:
        //        $payment = $weekly_payment;
        //        break;
        //    case 2:
        //        //
        //        break;
        //    case 3:
        //        //
        //        break;
        //    default
        //        //
        //    }
        
        // if pay forknight: 10% disc.
        // forknight_payment - (forknight_payment * .1)
        
        // if pay weekly: 0% disc.
        // weekly_payment - (weekly_payment * .0)
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
		<link rel="shortcut icon" href="../../favicon.ico">
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
					<h3 id="exam-name"><?php echo $coursename . '<sup><small> $'. $weekly_payment . ' semanal</small></sup>';?></h3>
					<div class="metadata">
						<span class="cef">CEF: <a href="pagina.php?id=1" class=""><?php echo $cef_desc ?></a> &nbsp;|&nbsp;Categor&iacute;a: <?php echo $coursecat ?> &nbsp;|&nbsp;Semanas: <?php echo $total_weeks . ' ('. $hours_per_week .'-hrs/sem)' ?> &nbsp;|&nbsp;Total horas: <?php echo $total_hours; ?>&nbsp;|&nbsp;<span class="text-success"><strong>Pago quincenal: <?php echo $forknightly_payment; ?></strong></span></span></span>
                    </div>
                    
					<?php echo 'Precio incluye: '.$incluye ?>
					<?php echo $course_desc ?>
					<?php echo $competences ?>
					<a class="btn btn-primary" href="<?php echo $domain; ?>/contacto" role="button">Solicita m&aacute;s informaci&oacute;n &raquo;</a><?php echo $temario_link; ?>
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