<?php
	include_once('functions.php');
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:url"           content="<?php echo canonical() ?>"/>
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Adjetivos Comparativos" />
		<meta property="og:description"   content="Escribe frases usando la forma comparativa del adjetivo." />
		<meta property="og:image"         content="" />
		<meta name="description" content="">
		<meta name="author" content="Vida Inglés">
		<title>Adjetivos comparativos</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" href="css/appp_styles.css" media="screen" />
	</head>
	<body>
		<?php include_once('includes/template_top_navbar.php') ?>
		<div class="container">
			<div class="row">
				<div class="col-md-9 marketing">
					<section>
						<h1>Ejercicios</h1>
						<form role="form">
							<h3>Adjetivos Comparativos</h3>
							<div class="fb-like"></div>
							<div class="form-inline">
								<div class="form-group">
									<label for="nombre">Nombre: </label> <input type="text" autofocus="" class="form-control" id="nombre" placeholder="Primer nombre"/>
								</div>
								<div class="form-group">
									<label for="nombre">Apellido: </label> <input type="text" class="form-control" id="apellido" placeholder="Primer apellido"/>
								</div>
							</div>
							<h4>1. Escribe frases comparando dos personas o cosas.</h4> 
							<ol>
								<li>
									<div class="form-group">
										<label for="q1">Mice / dogs. (fast)</label>
										<input type="text" class="form-control" id="q1" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q2">We / the group next door. (advanced)</label>
										<input type="text" class="form-control" id="q2" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q3">Selena / Lady Gaga. (beautiful)</label>
										<input type="text" class="form-control" id="q3" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q4">Charlie / Danny. (funny)</label>
										<input type="text" class="form-control" id="q4" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q5">Carl's car / Pete's. (new)</label>
										<input type="text" class="form-control" id="q5" placeholder="">
									</div>
								</li>
							</ol>
							<h4>2. Escribe frases comparando personas o cosas (negativo)</h4>
							<ol>
								<li>
									<div class="form-group">
										<label for="q6">Tokyo / Mexico City. (not crowded)</label>
										<input type="text" class="form-control" id="q6" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q7">Mike's house / Gina's. (not big)</label>
										<input type="text" class="form-control" id="q7" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q8">My situation / your situation. (not terrible)</label>
										<input type="text" class="form-control" id="q8" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q9">Today's homework / yesterday's. (not complicated)</label>
										<input type="text" class="form-control" id="q9" placeholder="">
									</div>
								</li>
								<li>
									<div class="form-group">
										<label for="q10">My parents / Tina's. (not nice)</label>
										<input type="text" class="form-control" id="q10" placeholder="">
									</div>
								</li>
							</ol>
							<h4>3. Escribe preguntas comparando. Responde en positivo y negativo.</h4>
							<ol>
								<li>
									<div class="form-group">
										<label for="q11">Your mobile / mine? (new)</label>
										<input type="text" class="form-control" id="q11" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q12">Respuesta corta positiva.</label>
										<input type="text" class="form-control" id="q12" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q13">Respuesta corta negativa.</label>
										<input type="text" class="form-control" id="q13" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q14">Today / yesterday? (hot)</label>
										<input type="text" class="form-control" id="q14" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q15">Respuesta corta positiva.</label>
										<input type="text" class="form-control" id="q15" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q16">Respuesta corta negativa.</label>
										<input type="text" class="form-control" id="q16" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q17">TVs / mobile phones? (expensive)</label>
										<input type="text" class="form-control" id="q17" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q18">Respuesta corta positiva</label>
										<input type="text" class="form-control" id="q18" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q19">Respuesta corta negativa.</label>
										<input type="text" class="form-control" id="q19" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q20">Genetically modified mosquitos / natural mosquitos? (dangerous)</label>
										<input type="text" class="form-control" id="q20" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q21">Respuesta corta positiva</label>
										<input type="text" class="form-control" id="q21" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q22">Respuesta corta negativa.</label>
										<input type="text" class="form-control" id="q22" placeholder="">
									</div>
									&nbsp;
								</li>
								<li>
									<div class="form-group">
										<label for="q23">I / you? (clever)</label>
										<input type="text" class="form-control" id="q23" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q24">Respuesta corta positiva.</label>
										<input type="text" class="form-control" id="q24" placeholder="">
									</div>
									<div class="form-group col-md-6">
										<label for="q25">Respuesta corta negativa.</label>
										<input type="text" class="form-control" id="q25" placeholder="">
									</div>&nbsp;
								</li>
							</ol>
							<br />
							<p class="sugerenciasLinkWrapper noprint"><a href="#" title="Lee las Reglas Gramaticales antes de checar respuestas." class="reglas-gramaticales-link">Reglas gramaticales <img src="<?php //echo home() ?>/i/arrow1.png" /></a></p>
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
							<button type="submit" class="btn btn-primary" id="checkBtn">Check Answers</button> <span class="msg"></span>
						</form>
					</section>
					<?php include_once('includes/app_ads.php') ?>
				</div>
				<div class="col-md-3 marketing">
					<?php include_once('includes/nav-links.php') ?>
				</div>
				<div class="fb-share-button" data-href="<?php echo canonical() ?>" data-layout="button_count"></div>
			</div><!-- Ends row -->
		</div><!-- Ends container -->
		<?php include_once('includes/template_footer.php') ?>
		<?php include_once('includes/fb-sdk.php') ?>
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="js/app.js"></script>
		<script type="text/javascript" src="js/adjetivos_comparativos.js"></script>
	</body>
</html>																		