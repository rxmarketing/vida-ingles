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
		$cef_level = $row["cef_level_id"];
		$ejer_nombre = $row["ejer_nombre"];
		$ejer_desc = $row["ejer_desc"];
		$ejer_page_title = strip_tags($ejer_nombre);
		$ejer_instr_p = $row["ejer_instrucciones_p"];
		$q1 = $row["ejerq1"];
		$q2 = $row["ejerq2"];
		$q3 = $row["ejerq3"];
		$q4 = $row["ejerq4"];
		$q5 = $row["ejerq5"];
		$ejer_instr_n = $row["ejer_instrucciones_n"];
		$q6 = $row["ejerq6"];
		$q7 = $row["ejerq7"];
		$q8 = $row["ejerq8"];
		$q9 = $row["ejerq9"];
		$q10 = $row["ejerq10"];
		$ejer_instr_i = $row["ejer_instrucciones_i"];
		$q11 = $row["ejerq11"];
		$q12 = $row["ejerq12"];
		$q13 = $row["ejerq13"];
		$q14 = $row["ejerq14"];
		$q15 = $row["ejerq15"];
		$q16 = $row["ejerq16"];
		$q17 = $row["ejerq17"];
		$q18 = $row["ejerq18"];
		$q19 = $row["ejerq19"];
		$q20 = $row["ejerq20"];
		$q21 = $row["ejerq21"];
		$q22 = $row["ejerq22"];
		$q23 = $row["ejerq23"];
		$q24 = $row["ejerq24"];
		$q25 = $row["ejerq25"];
		$ejer_friendly_name = $row["ejer_friendly_name"];
		$ejerguid = $row["ejer_guid"];
		//$ejer_desc = $ejer_nombre . ' ' . $ejer_instr_p;
		//FETCH THE LESSON TITLE AND FRIENDLY NAME FOR THE CURRENT EXERCISE
		$qry = "SELECT lesson_name, lessontitle FROM lecciones WHERE lessonid='$lesson_id' LIMIT 1";
		$lesnFriendName = mysqli_query($db_conx,$qry);
		while ($row = mysqli_fetch_array($lesnFriendName,MYSQLI_ASSOC)) {
			$leccionFriendName = $row['lesson_name'];
			$leccionTitle = $row['lessontitle'];
			$leccionTitleNoTags = strip_tags($leccionTitle);
		}
	}

?>
<!doctype html>
<html lang="es" translate="no">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../../favicon.ico">
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
		<link rel="canonical" href="<?php echo $ejercicio_canonical ?>" />
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
					<small class="mute"><?php echo $dice; ?></small>
					
					<section>
						<h1 class="ucase-text">Ejercicios de Ingl&eacute;s</h1>
						<form role="form" id="ejerAppForm" method="post" action="ajax/ajax_auto_save.php">
							<h3 class="encabezado-pagina"><?php echo $ejer_nombre; ?></h3>
							<div class="metadata">
						<span class=""><?php echo '<a href="#" data-html="<em>loco</em>" data-toggle="tooltip" data-placement="top" title="Marco Com&uacute;n Europeo de Referencia">CEF: '. $cefname .'</a>  | '. '<a href="'.$domain.'/lecciones/'.$lesson_id.'/'.$leccionFriendName.'" title="'.$leccionTitleNoTags.'" data-content="'.$lessonexcerpt.'" data-trigger="hover" rel="popover" data-placement="right">Ver leccion</a>' ?></span>
					</div>
					<p class="lead"><?php echo $ejer_desc ?></p>
							<div class="fb-like"></div>
							<?php include_once('includes/app_ads.php') ?>
							<h4 class="ejer-instr"><?php echo $ejer_instr_p; ?></h4>
				
							<ol>
								<li>
									<div class="form-group">
										<label for="q1"><?php echo $q1; ?></label>
										<input type="text" class="form-control" id="inputq1" name="inputq1" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q2"><?php echo $q2; ?></label>
										<input type="text" class="form-control" id="inputq2" name="inputq2" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q3"><?php echo $q3; ?></label>
										<input type="text" class="form-control" id="inputq3" name="inputq3" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q4"><?php echo $q4; ?></label>
										<input type="text" class="form-control" id="inputq4" name="inputq4" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q5"><?php echo $q5; ?></label>
										<input type="text" class="form-control" id="inputq5" name="inputq5" placeholder="">
									</div>
								</li>
							</ol>
							<h4><?php echo $ejer_instr_n; ?></h4>
							<ol>
								<li>
									<div class="form-group">
										<label for="q6"><?php echo $q6; ?></label>
										<input type="text" class="form-control" id="inputq6" name="inputq6" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q7"><?php echo $q7; ?></label>
										<input type="text" class="form-control" id="inputq7" name="inputq7" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q8"><?php echo $q8; ?></label>
										<input type="text" class="form-control" id="inputq8" name="inputq8" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q9"><?php echo $q9; ?></label>
										<input type="text" class="form-control" id="inputq9" name="inputq9" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q10"><?php echo $q10; ?></label>
										<input type="text" class="form-control" id="inputq10" name="inputq10" placeholder="">
									</div>
								</li>
							</ol>
							<h4><?php echo $ejer_instr_i; ?></h4>
							<ol>
								<li>
									<div class="form-group">
										<label for="q11"><?php echo $q11; ?></label>
										<input type="text" class="form-control" id="inputq11" name="inputq11" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q12"><?php echo $q12; ?></label>
										<input type="text" class="form-control" id="inputq12" name="inputq12" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q13"><?php echo $q13; ?></label>
										<input type="text" class="form-control" id="inputq13" name="inputq13" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q14"><?php echo $q14; ?></label>
										<input type="text" class="form-control" id="inputq14" name="inputq14" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q15"><?php echo $q15; ?></label>
										<input type="text" class="form-control" id="inputq15" name="inputq15" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q16"><?php echo $q16; ?></label>
										<input type="text" class="form-control" id="inputq16" name="inputq16" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q17"><?php echo $q17; ?></label>
										<input type="text" class="form-control" id="inputq17" name="inputq17" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q18"><?php echo $q18; ?></label>
										<input type="text" class="form-control" id="inputq18" name="inputq18" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q19"><?php echo $q19; ?></label>
										<input type="text" class="form-control" id="inputq19" name="inputq19" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q20"><?php echo $q20; ?></label>
										<input type="text" class="form-control" id="inputq20" name="inputq20" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q21"><?php echo $q21; ?></label>
										<input type="text" class="form-control" id="inputq21" name="inputq21" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q22"><?php echo $q22; ?></label>
										<input type="text" class="form-control" id="inputq22" name="inputq22" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q23"><?php echo $q23; ?></label>
										<input type="text" class="form-control" id="inputq23" name="inputq23" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q24"><?php echo $q24; ?></label>
										<input type="text" class="form-control" id="inputq24" name="inputq24" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q25"><?php echo $q25; ?></label>
										<input type="text" class="form-control" id="inputq25" name="inputq25" placeholder="">
									</div>&nbsp;
								</li>
							</ol>
							<p class="sugerenciasLinkWrapper noprint">
								<a href="#" title="Lee las Reglas Gramaticales antes de checar resultados." class="reglas-gramaticales-link">Reglas gramaticales <span class="caret"></span></a>
							</p>
							<d|iv class="well" id="sugerencias" style="display:none">
								<h4>Sigue estas reglas gramaticales antes de checar resultados</h4>
								<ul class="lista-sugerencias">
									<li>La primera letra al comienzo de una oración <em>debe</em> ser mayúscula.</li>
									<li>Al final de la oración <em>debe llevar punto final.</em></li>
									<li>Escribe el pronombre personal <em>I (Yo) con MAYÚSCULA</em> aun cuando este en medio de la oración.</li>
									<li>Los nombres propios, dias de la semana o meses del año <em>deben comenzar con MAYÚSCULA</em>.</li>
									<li>Asegúrate de <em>no poner doble espacio</em> entre palabras.</li>
									<li>Después del punto final <em>no deben haber espacios</em>.</li>
									<li><em>Utiliza (Shift + ?) para el apóstrofe</em> de las contracciones (short form) junto a la tecla cero.</li>
								</ul>
							</div><!--Ends sugerencias div -->
							<div class="col-md-8">
								<button type="submit" class="btn btn-primary noprint" id="evalEjerBtn">Ver resultados</button> 
								<button type="submit" class="btn btn-primary noprint" id="saveBtn">Guardar resultados</button> 
								<input type="hidden" name="ejerid" id="ejerid" value="<?php echo $ejer_id ?>"/>
								<input type="hidden" name="resultId" id="resultId"/>
							<input type="hidden" name="ejerNombre" id="ejerNombre" value="<?php echo $ejer_nombre ?>"/>
							<input type="hidden" name="logusername" id="logusername" value="<?php echo $log_username ?>"/>
								<span class="msg"></span>
								<span class="autosave"></span>
							</div>
							<div class="col-md-1">
								<div class="fb-share-button text-right" data-href="<?php echo canonical() ?>" data-layout="button_count"></div>
							</div>
						</form>
					</section>
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
<script>
$(document).ready(function () {
    function autoSave() {
        var input1 = $("#inputq1").val(), input2 = $("#inputq2").val(), input3 = $("#inputq3").val(), input4 = $("#inputq4").val(), input5 = $("#inputq5").val(), input6 = $("#inputq6").val(), input7 = $("#inputq7").val(), input8 = $("#inputq8").val(), input9 = $("#inputq9").val(), input10 = $("#inputq10").val(), resultId = $("#resultId").val(), username = $("#logusername").val();
        if (username !== '') {
            $.ajax({
                url: "ajax/ajax_auto_save.php",
                method: "post",
                data: $("#ejerAppForm").serializeArray(),
                dataType: "html",
                success: function (data) {
                    if (data !== '') {
                        $("#resultId").val(data);
                    }
                    alert(data);
                    $(".autosave").text("Ejercicio auto-guardado.");
                    setInterval(function () {
                        $(".autosave").text("");
                    }, 2000);
                }
            });
        }
    }
    setInterval(function () {
        autoSave();
    }, 10000);
});
</script>