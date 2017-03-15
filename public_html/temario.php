<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
    if(isset($login_id)){
        if((time() - $_SESSION['lastlogintime']) > 900){
            header('location: logout.php');
        }
    }
	// Make sure the _GET username is set, and sanitize it
	if(isset($_GET["temario_id"])){
		$temarioid = preg_replace('#[^0-9]#', '', $_GET['temario_id']);
		} else {
    header("location: login.php");
    exit();	
	}
		$moduleList = "";
		$unitList = "";
		//Fetch the lesson from DB table
	$sql = "SELECT * FROM temarios WHERE temario_id='$temarioid'";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$temarioId = $row["temario_id"];
		$cursoId = $row["curso_id"];
		$moduleName = $row["module_name"];
        $unitNumber = $row["unit_num"];
        $functions = $row["Functions"];
        $communication = $row["Communication"];
		$grammar = $row["grammar"];
		$vocabulary = $row["vocabulary"];
        $skills = $row["skills"];
        $unitList .= '<li>' . $unitNumber . '</li>';
        $moduleList .= '<h3><li>' . $moduleName . '</h3>
            <ul class="list-unstyled">
                <li><h4>'.$unitNumber.'</h4>
                <h5>Functions</h5>
                    <ul class="list-unstyled"><li>'.$functions.'</li></ul>
                <h5>Communication</h5>
                    <ul class="list-unstyled"><li>'.$communication.'</li></ul>
                <h5>Grammar</h5>
                    <ul class="list-unstyled"><li>'.$grammar.'</li></ul>
                </li>
                <h5>Vocabulary</h5>
                <ul class="list-unstyled">
                    <li>'.$vocabulary.'</li>
                </ul>
                <h5>Skills</h5>
                <ul class="list-unstyled">
                    <li>'.$skills.'</li>
                </ul>
            </ul>
        </li>';
		
		// FETCH THE COURSE NAME AND COURSE FRIENDLY NAME FOR THE LESSON FROM CURSOS TABLE
		$qry = "SELECT coursename, curso_friendly_name FROM cursos WHERE courseid='$cursoId'";
		$res = mysqli_query($db_conx,$qry);
		while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)) {
			$cursoName = $row['coursename'];
			$cursoFriendlyName = $row['curso_friendly_name'];
		}
		// BUILD THE CURSO LINK
		$coursename_link = '<a href="'.$domain.'/cursos/'.$cursoId.'/'.$cursoFriendlyName.'" title="Curso: '.$cursoName.'">Curso: '.$cursoName.'</a>';
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<title>Temario <?php echo $cursoName ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../../favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="Temario <?php echo $cursoName ?>" />
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
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- SHOWCASE =======================================================-->
		<?php echo $showcase ?>
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1 class="mute ucase-text">Temario</h1>
					<article>
					<div itemscope itemtype="http://schema.org/BlogPosting">
						<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo $lesson_canonical ?>"/>
						<h3 itemprop="headline" id="exam-name"><?php echo $cursoName ?></h3>
						
						<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<img src="<?php echo $lesson_image_canonical ?>" class="img-responsive thumbnail"/>
							<meta itemprop="url" content="<?php echo $lesson_image_canonical ?>">
							<meta itemprop="width" content="800">
							<meta itemprop="height" content="800">
						</div>
						<span itemprop="description"></span>
                        <ul class="list-unstyled">
                            <?php echo $moduleList; ?>
                        </ul>
                        
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
					<hr class="featurette-divider noprint">
					<ul id="etiquetas" class="list-inline noprint">
					<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
					 <li>temario <?php echo $cursoName ?></li>
					</ul>
                    <a class="btn btn-primary" href="<?php echo $domain; ?>/contacto" role="button">Solicita m&aacute;s informaci&oacute;n &raquo;</a>
					</article>
					<hr class="featurette-divider noprint">
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