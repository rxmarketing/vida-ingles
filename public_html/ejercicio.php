<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	if(isset($_GET["id"])){
		$ejerid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
		header("location: login.php");
		exit();	
	}
	$ejer_userid = "";
	$ejer_nombre = "";
	$ejer_instr = "";
	$input_q1 = "";
	$q2 = "";
	$q3 = "";
	// Checks how many times user has done this exercise 
	$sql = "SELECT COUNT(ejer_id) FROM resultados_ejercicios WHERE ejer_id = '$ejerid' AND userid='$log_id'";
	$countRes = mysqli_query($db_conx,$sql);
	$ejerCheck = mysqli_fetch_row($countRes);
	$ejerCount = $ejerCheck[0];
	if($ejerCount > 0 ) {
		$dice = "Haz hecho este ejercicio <b>" . $ejerCount . "</b> veces";
		} else {
		$dice = "";
	}
	// GATHER ejercicios QUESTIONS FROM ejercicios TABLE into variables
	$sql = "SELECT * FROM ejercicios WHERE ejer_id='$ejerid' LIMIT 1";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$ejer_id = $row["ejer_id"];
		$lesson_id = $row["lessonid"];
		$cef_level = $row["cef_level"];
		$ejer_nombre = $row["ejer_nombre"];
		$ejer_page_title = strip_tags($ejer_nombre);
		$ejer_instr = $row["ejer_instrucciones"];
		$q1 = $row["ejerq1"];
		$q2 = $row["ejerq2"];
		$q3 = $row["ejerq3"];
		$q4 = $row["ejerq4"];
		$q5 = $row["ejerq5"];
		$q6 = $row["ejerq6"];
		$q7 = $row["ejerq7"];
		$q8 = $row["ejerq8"];
		$q9 = $row["ejerq9"];
		$q10 = $row["ejerq10"];
		$ejerguid = $row["ejer_guid"];
		$ejerfriendlyname = $row["ejer_friendly_name"];
		$ejer_canonical = 'http://vidaingles.com/ejercicios/'.$ejer_id.'/'.$ejerfriendlyname;
		$ejer_desc = $ejer_nombre . ' ' . $ejer_instr;
		$qry = "SELECT lesson_name, lessontitle FROM lecciones WHERE lessonid='$lesson_id' LIMIT 1";
		$lesnFriendName = mysqli_query($db_conx,$qry);
		while ($row = mysqli_fetch_array($lesnFriendName,MYSQLI_ASSOC)) {
			$leccionFriendName = $row['lesson_name'];
			$leccionTitle = $row['lessontitle'];
			$leccionTitleNoTags = strip_tags($leccionTitle);
		}
	}
	// Ejercicio desc and keywords
	$desc_meta_ejer = strip_tags($ejer_desc);
	$desc_meta_ejer = str_replace('.','',$desc_meta_ejer);
	$desc_meta_ejer = str_replace(',','',$desc_meta_ejer);
	$desc_meta_ejer = str_replace('"','',$desc_meta_ejer);
	$desc_meta_ejer = str_replace(')','',$desc_meta_ejer);
	$desc_meta_ejer = str_replace('(','',$desc_meta_ejer);
	$desc_meta_ejer = str_replace(':','',$desc_meta_ejer);
	$keywords_ejer = $desc_meta_ejer;
	$keywords_ejer = str_replace(' ',',',$keywords_ejer);
	$keywords_ejer = str_replace(',o,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',a,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',de,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',que,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',lo,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',la,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',las,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',los,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',sus,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',es,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',/,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',para,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',el,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',si,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',hay,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',u,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',ya,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',sea,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',por,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',por,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',+,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',pero,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',otra,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',y,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',no,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',en,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',ha,',',',$keywords_ejer);
	$keywords_ejer = str_replace('El,','',$keywords_ejer);
	$keywords_ejer = str_replace('En,','',$keywords_ejer);
	$keywords_ejer = str_replace('Los,','',$keywords_ejer);
	$keywords_ejer = str_replace('La,','',$keywords_ejer);
	$keywords_ejer = str_replace('Le,','',$keywords_ejer);
	$keywords_ejer = str_replace('Las,','',$keywords_ejer);
	$keywords_ejer = str_replace('Se,','',$keywords_ejer);
	$keywords_ejer = str_replace('Para,','',$keywords_ejer);
	$keywords_ejer = str_replace(',se,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',son,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',una,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',un,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',desde,',',',$keywords_ejer);
	$keywords_ejer = str_replace(',para,',',',$keywords_ejer);
	$keywords_ejer =preg_replace('/,,+/', ',', $keywords_ejer);
	$keywords_ejer = str_replace(",",", ",$keywords_ejer);
?>
<!doctype html>
<html lang="es" translate="no">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Ejercicio: <?php echo $ejer_page_title; ?></title>
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="<?php echo $keywords_ejer ?>" />
		<meta name="description" content="" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content="<?php echo canonical(); ?>"/>  
		<meta property="og:title" content="<?php echo $ejer_page_title ?>" />
		<meta property="og:description" content="<?php echo $desc_meta_ejer ?>" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="" />
		<link rel="canonical" href="<?php echo $ejer_canonical ?>" />
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
			<div class="row" id="testWrapper">
				<div class="col-md-8">
					<h1 class="mute ucase-text">Ejercicio</h1>
					<h3 id="exam-name"><?php echo $ejer_nombre ?></h3>
					<small class="mute"><?php echo $dice; ?></small>
					<div class="metadata">
						<span class=""><?php echo '<a href="#" data-html="<em>loco</em>" data-toggle="tooltip" data-placement="top" alt="Marco Común Europeo de Referencia" title="Marco Com&uacute;n Europeo de Referencia">CEF: '. $cefname .'</a>  | '. '<a href="'.$domain.'/lecciones/'.$lesson_id.'/'.$leccionFriendName.'" title="'.$leccionTitleNoTags.'" data-content="'.$lessonexcerpt.'" data-trigger="hover" rel="popover" data-placement="right">Ver leccion</a>' ?></span>
					</div>
					<h5><?php echo $ejer_instr; ?></h5>
					<div id="formbox">
						<form class="" type="post" role="form" name="ejerForm" id="ejerForm">
							<ol id="exam-quest-list">
								<div class="form-group">
									<li>
										<label for="question1" id="" class="vi-label"><?php echo $q1; ?></label>
										<input type="text" class="form-control noprint" title="Key in the answer" name="inputq1" autofocus="" id="inputq1"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question2" id="" class="vi-label"><?php echo $q2; ?></label>
										<input type="text" name="inputq2" id="inputq2" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question3" id="" class="vi-label"><?php echo $q3; ?></label>
										<input type="text" name="inputq3" id="inputq3" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question4" id="" class="vi-label"><?php echo $q4; ?></label>
										<input type="text" name="inputq4" id="inputq4" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="question5" id="" class="vi-label"><?php echo $q5; ?></label>
										<input type="text" name="inputq5" id="inputq5" class="form-control"/>
										</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq6" id="" class="vi-label"><?php echo $q6; ?></label>
										<input type="text" name="inputq6" id="inputq6" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq7" id="" class="vi-label"><?php echo $q7; ?></label>
										<input type="text" name="inputq7" id="inputq7" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq8" id="" class="vi-label"><?php echo $q8; ?></label>
										<input type="text" name="inputq8" id="inputq8" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq9" id="" class="vi-label"><?php echo $q9; ?></label>
										<input type="text" name="inputq9" id="inputq9" class="form-control"/>
									</li>
								</div>
								<div class="form-group">
									<li>
										<label for="inputq10" id="" class="vi-label"><?php echo $q10; ?></label>
										<input type="text" name="inputq10" id="inputq10" class="form-control"/>
									</li>
								</div>
							</ol>
							<p class="sugerenciasLinkWrapper noprint"><a href="#" title="Lee las Reglas Gramaticales antes de checar respuestas." class="reglas-gramaticales-link">Reglas gramaticales <img src="<?php echo home() ?>/i/arrow1.png" /></a></p>
							<div class="well" id="sugerencias" style="display:none">
								<h4>Sigue estas reglas gramaticales antes de checar resultados</h4>
								<ul class="lista-sugerencias">
									<li>La primera letra al comienzo de una oraci&oacute;n <em>debe</em> ser may&uacute;scula.</li>
									<li>Al final de la oraci&oacute;n <em>debe llevar punto final.</em></li>
									<li>Escribe el pronombre personal <em>I (Yo) con MAY&Uacute;SCULA</em> aun cuando este en medio de la oraci&oacute;n.</li>
									<li>Los nombres propios, dias de la semana o meses del a&ntilde;o <em>deben comenzar con MAY&Uacute;SCULA</em>.</li>
									<li>Aseg&uacute;rate de <em>no poner doble espacio</em> entre palabras.</li>
									<li>Despu&eacute;s del punto final <em>no deben haber espacios</em>.</li>
									<li><em>Utiliza el ap&oacute;strofe correcto</em> (Shift + tecla del signo de pregunta junto a la tecla cero) para las contracciones.</li>
								</ul>
							</div><!--Ends sugerencias div -->
							<button id="evalEjerBtn" class="btn btn-success noprint" data-loading-text="Evaluando...">Checar Resultados</button>
							<input type="hidden" name="ejerid" id="ejerid" value="<?php echo $ejer_id ?>"/>
							<input type="hidden" name="ejerNombre" id="ejerNombre" value="<?php echo $ejer_nombre ?>"/>
							<input type="hidden" name="logusername" id="logusername" value="<?php echo $log_username ?>"/>
							<span id="aviso"></span>
						</form><!--Ends testform -->
					</div><!--ends formbox div -->
					<div class="noprint">
						<?php include_once('ads/ad_responsive.php')?>
					</div>
				</div><!-- Ends col-md-8 -->
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
		<script src="<?php echo home() ?>/js/check_results.js"></script>
	</body>
</html>																	