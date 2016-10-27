<?php
	include_once('functions.php');
?>
<!DOCTYPE HTML>
<html lang="es" translate="no">
	<head>
		<title>Pronombres personales</title>
		<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />
  <meta property="og:url"           content="<?php echo canonical() ?>" />
  <meta property="og:type"          content="Article" />
  <meta property="og:title"         content="Pronombre Personales" />
  <meta property="og:description"   content="Ejercicio: Escribe frases cambiando el sujeto por el pronombre personal correspondiente." />
  <meta property="og:image"         content="" />
		<meta name="keywords" content="pronombres personales ingles, clases ingles, lecciones ingles, vida ingles" />
  <meta name="description" content="Ejercicio: Escribe frases cambiando el sujeto por el pronombre personal correspondiente.">
  <meta name="author" content="Ricardo Maldonado">
		<link rel="canonical" href="<?php echo canonical() ?>" />
		<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" href="css/jquery-ui.min.css"/>
  <link rel="stylesheet" href="css/app_styles.css" media="screen" />
		<link rel="stylesheet" href="css/app_print_styles.css" media="print" />

</head>
<body>
	<?php include_once('includes/template_top_navbar.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-9 marketing">
				<section>
					<h1>Ejercicios</h1>
					<form role="form">
						<h3>Pronombres Personales</h3>
						<div class="fb-like"></div>
						<?php include_once('includes/app_ads.php') ?>
						<div class="form-inline">
							<div class="form-group">
								<label for="nombre">Nombre: </label> <input type="text" autofocus="" class="form-control" id="nombre" placeholder="Primer nombre"/>
       </div>
							<div class="form-group">
								<label for="nombre">Apellido: </label> <input type="text" class="form-control" id="apellido" placeholder="Primer apellido"/>
       </div>
      </div>
						<h4>1. Escribe otra vez las oraciones cambiando el <em>sujeto</em> por un <b>pronombre personal</b></h4>
						<ol>
							<li>
								<div class="form-group">
									<label for="q1"><em>Rico</em> is in Scotland.</label>
									<input type="text" class="form-control" id="q1" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q2"><em>My cat</em> is next door.</label>
									<input type="text" class="form-control" id="q2" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q3"><em>Gabriela and Tim</em> are married.</label>
									<input type="text" class="form-control" id="q3" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q4"><em>Their house</em> is beautiful.</label>
									<input type="text" class="form-control" id="q4" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q5"><em>My sister and I</em> are happy.</label>
									<input type="text" class="form-control" id="q5" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q6"><em>Her mum</em> is at the store.</label>
									<input type="text" class="form-control" id="q6" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q7"><em>Jake and his girlfriend</em> are 22.</label>
									<input type="text" class="form-control" id="q7" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q8"><em>Dogs</em> are best friends.</label>
									<input type="text" class="form-control" id="q8" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q9"><em>Isabel's parents</em> are on holiday.</label>
									<input type="text" class="form-control" id="q9" placeholder="">
        </div>
       </li>
							<li>
								<div class="form-group">
									<label for="q10"><em>The children</em> aren't in the garden.</label>
									<input type="text" class="form-control" id="q10" placeholder="">
        </div>
       </li>
      </ol>
						<p class="sugerenciasLinkWrapper noprint"><a href="#" title="Lee las Reglas Gramaticales antes de checar resultados." class="reglas-gramaticales-link">Reglas gramaticales <span class="caret"></span></a></p>
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
							<button type="submit" class="btn btn-primary noprint" id="checkBtn">Check Answers</button> <span class="msg"></span>
      </div>
						<div class="col-md-1">
							<div class="fb-share-button text-right" data-href="<?php echo canonical() ?>" data-layout="button_count"></div>
      </div>
     </form>
    </section>
   </div>
			<div class="col-md-3 marketing noprint" id="right-sidebar">
				<?php include_once('includes/nav-links.php') ?>
   </div>
  </div>
 </div><!-- Ends container -->
	<?php include('includes/template_footer.php') ?>
	<script async src="js/pronombres_personales.js"></script>
</body>
</html>