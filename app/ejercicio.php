<?php
	// include_once('functions.php');

 $db_conx = new mysqli("localhost","ricardo","tio51tony50","app");
    $db_conx->set_charset("utf8");
    if($db_conx->connect_errno) {
        echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
        echo "ERRNO: " . $db_conx->connect_errno . "<br />";
        echo "ERROR: " . $db_conx->connect_error;
        exit;
    }
	function canonical() {
		$url  = 'http://';
		$url .= $_SERVER['HTTP_HOST'];
		$url .= $_SERVER['REQUEST_URI'];
		echo $url;
    }

	if(isset($_GET["id"])){
		$ejerid = preg_replace('#[^0-9]#', '', $_GET['id']);
		} else {
		header("location: login.php");
		exit();	
	}
    //GATHER CURRENT EXERCISE
    $sql = "SELECT * FROM ejercicios_i WHERE ejerid='$ejerid' LIMIT 1";
    $qry = mysqli_query($db_conx,$sql);
    while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
        $eid = $row['ejerid'];
        $etype = $row['ejertype'];
        $ename = $row['ejername'];
        $enameNoTags = strip_tags($ename);
        $edesc = $row['ejerdesc'];
        $edescNoTags = strip_tags($edesc);
        $emodified = $row['datemodified'];
    }

	// GATHER POSITIVE PROMPTS FROM ejercicios_detalles TABLE into variables
    $pos_prompt_list = null;
	$sql = "SELECT * FROM ejercicios_detalles WHERE ejerid='$ejerid' AND ejer_form='positive' ORDER BY RAND() LIMIT 5";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$ejer_det_id = $row["ejerdet_id"];
		$ejer_id = $row["ejerid"];
		$ejer_prompt = $row["prompt"];
		$ejer_answer = $row["answer"];
		$pos_prompt_list .= '<br /><li><span class="form-group"><label for="inputq-'.$ejer_det_id.'">'. $ejer_prompt .'</label><input type="text" class="form-control" id="inputq-'.$ejer_det_id.'" name="inputq-'.$ejer_det_id.'" placeholder=""></span></li>';
	}
	// GATHER NEGATIVE PROMPTS FROM ejercicios TABLE into variables
    $neg_prompt_list = null;
	$sql = "SELECT * FROM ejercicios_detalles WHERE ejerid='$ejerid' AND ejer_form='negative' ORDER BY RAND() LIMIT 5";
	$test_query = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($test_query, MYSQLI_ASSOC)) {
		$ejer_det_id = $row["ejerdet_id"];
		$ejer_id = $row["ejerid"];
		$ejer_prompt = $row["prompt"];
		$ejer_answer = $row["answer"];
		$neg_prompt_list .= '<br /><li><span class="form-group"><label for="inputq-'.$ejer_det_id.'">'. $ejer_prompt .'</label><input type="text" class="form-control" id="inputq-'.$ejer_det_id.'" name="inputq-'.$ejer_det_id.'" placeholder=""></span></li>';
	}
?>
<!DOCTYPE HTML>
<html lang="es" translate="no">
	<head>
		<title>Ejercicio <?php echo $enameNoTags ?></title>
		<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />
    <meta property="og:url"           content="<?php echo canonical() ?>"/>
    <meta property="og:type"          content="Article" />
    <meta property="og:title"         content="Ejercicio <?php echo $enameNoTags ?>" />
    <meta property="og:description"   content="<?php echo $edescNoTags; ?>" />
    <meta property="og:image"         content="" />
		<meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="Ricardo Maldonado">
		<link rel="canonical" href="<?php echo canonical() ?>" />
		<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" href="css/jquery-ui.min.css"/>
   	<link rel="stylesheet" href="css/app_styles.css" media="screen" />
		<link rel="stylesheet" href="css/app_print_styles.css" media="print" />
		<script src="http://localhost/vidaingles/js/jquery-1.11.3.min.js"></script>
		<script src="http://localhost/vidaingles/js/bootstrap.min.js"></script>
		<script src="http://localhost/vidaingles/js/jquery-ui.min.js"></script>
		<script src="http://localhost/vidaingles/js/login.js"></script>
		<script src="http://localhost/vidaingles/js/timeago.js"></script>
		<script src="http://localhost/vidaingles/js/vidaingles.js"></script>
		<script src="http://localhost/vidaingles/js/check_results_app.js"></script>
	</head>
	<body>
		<?php include_once('includes/template_top_navbar.php') ?>
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-9 marketing">
							<small class="pull-right"><?php //echo $user_fullname; ?></small>
					<section>
						<h1>Ejercicios</h1>
						<form role="form" id="ejerAppForm">
							<h3><?php echo $ename ?></h3>
							<div class="fb-like"></div>
							<?php include_once('includes/app_ads.php') ?>
							<h4><?php echo $edesc; ?></h4>
				
							<ol>
                            <h2>Forma positiva</h2>
							<?php echo $pos_prompt_list; ?>
                            <h2>Forma negativa</h2>
							<?php echo $neg_prompt_list; ?>
							</ol>
							<small class="cef">Actualizado: <abbr class="timeago" title="<?php echo $emodified ?>"><?php echo $emodified ?></abbr></small>

							<p class="sugerenciasLinkWrapper noprint">
								<a href="#" title="Lee las Reglas Gramaticales antes de checar resultados." class="reglas-gramaticales-link">Reglas gramaticales <span class="caret"></span></a>
							</p>
							<div class="well" id="sugerencias" style="display:none">
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
								<input type="hidden" name="ejerid" id="ejerid" value="<?php echo $eid ?>"/>
							<input type="hidden" name="ejerNombre" id="ejerNombre" value="<?php echo $ename ?>"/>
							<input type="hidden" name="logusername" id="logusername" value="<?php //echo $log_username ?>"/>
								<span class="msg"></span>
							</div>
							<div class="col-md-1">
								<div class="fb-share-button text-right" data-href="<?php //echo canonical() ?>" data-layout="button_count"></div>
							</div>
						</form>
					</section>
				</div>
				<div class="col-md-3 marketing noprint" id="right-sidebar">
					<?php include_once('includes/nav-links.php') ?>
				</div>
			</div><!-- Ends container -->
		</div>
		<?php include('includes/template_footer.php') ?>
		
	</body>
</html>