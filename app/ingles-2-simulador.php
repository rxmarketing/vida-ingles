<?php
include_once('functions.php');
?>
<!DOCTYPE HTML>
<html lang="es" translate="no">
<head>
	<title>Ingles II - Simulador</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="fb:app_id" content="382987081744830"/>
	<meta property="fb:admins" content="1335978648"/>
	<meta property="og:url" content="<?php echo canonical() ?>"/>
	<meta property="og:type" content="Article"/>
	<meta property="og:title" content="Tercer Condicional"/>
	<meta property="og:description" content="Ejercicio: Escribe frases con el Tercer Condicional."/>
	<meta property="og:image" content=""/>
	<meta name="keywords" content="Tercer Condicional, clases ingles, lecciones ingles, vida ingles"/>
	<meta name="description" content="Ejercicio: Escribe frases con el Tercer Condicional.">
	<meta name="author" content="Ricardo Maldonado">
	<link rel="canonical" href="<?php echo canonical() ?>"/>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/app_styles.css" media="screen"/>
	<link rel="stylesheet" href="css/app_print_styles.css" media="print"/>
</head>
<body>
<?php include_once('includes/template_top_navbar.php') ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 marketing">
			<section>
				<h1>Ejercicios</h1>
				<form role="form">
					<h3>Simulador - Ingles I</h3>
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
					<h4>Elige la opción correcta.</h4>
					<ol>
						<li>
							<div class="form-group">
								<label for="q1" id="lm1">Please, ______ quiet! <span class="msg1"></span></label>
								<div class="radio">
									<label>
										<input type="radio" name="q1" id="" value="a">
										be
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q1" id="" value="b">
										do
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q1" id="" value="c">
										is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q1" id="" value="d">
										does
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q2" id="lm2">_________ Joe quick? No, he's slow.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q2" id="" value="a">
										Does
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q2" id="" value="b">
										Is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q2" id="" value="c">
										Do
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q2" id="" value="d">
										I
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q3" id="lm3">_________ sugar.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q3" id="" value="a">
										It
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q3" id="" value="b">
										It is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q3" id="" value="c">
										Is a
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q3" id="" value="d">
										It is a
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q4" id="lm4">_________ she eating? Bread</label>
								<div class="radio">
									<label>
										<input type="radio" name="q4" id="" value="a">
										How is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q4" id="" value="b">
										What is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q4" id="" value="c">
										How does
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q4" id="" value="d">
										What does
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q5" id="lm5">_________Martha's watch _________? No, round.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q5" id="" value="a">
										Is / lazy
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q5" id="" value="b">
										Does / lazy
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q5" id="" value="c">
										Is / square
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q5" id="" value="d">
										Does / square
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q6" id="lm6">_______ us ________ to the store.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q6" id="" value="a">
										Let / go
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q6" id="" value="b">
										Let's / go
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q6" id="" value="c">
										Let / goes
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q6" id="" value="d">
										Let's / goes
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q7" id="lm7">Mrs. Smith _______ swimming ______ the boat</label>
								<div class="radio">
									<label>
										<input type="radio" name="q7" id="" value="a">
										is / to
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q7" id="" value="b">
										is / at
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q7" id="" value="c">
										goes / at
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q7" id="" value="d">
										goes / for
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q8" id="lm8">_______ are Laura and Paul _______?</label>
								<div class="radio">
									<label>
										<input type="radio" name="q8" id="" value="a">
										Where / doing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q8" id="" value="b">
										Where / do
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q8" id="" value="c">
										What / doing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q8" id="" value="d">
										What / do
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q9" id="lm9">_______ Brian _______ T.V. now?</label>
								<div class="radio">
									<label>
										<input type="radio" name="q9" id="" value="a">
										Is / watching
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q9" id="" value="b">
										Does / watches
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q9" id="" value="c">
										Is / watching
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q9" id="" value="d">
										Does / watching
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q10" id="lm10">John and Mary kiss ______ mother.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q10" id="" value="a">
										they're
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q10" id="" value="b">
										your're
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q10" id="" value="c">
										their
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q10" id="" value="d">
										your
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q11" id="lm11">It's __________ dog.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q11" id="" value="a">
										me
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q11" id="" value="b">
										our
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q11" id="" value="c">
										you
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q11" id="" value="d">
										they're
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q12" id="lm12">Frank's walking to ___________.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q12" id="" value="a">
										downtown
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q12" id="" value="b">
										kitchen
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q12" id="" value="c">
										museum
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q12" id="" value="d">
										church
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q13" id="lm13">The umbrella's open. Close ______.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q13" id="" value="a">
										it
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q13" id="" value="b">
										its
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q13" id="" value="c">
										her
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q13" id="" value="d">
										She
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q14" id="lm14">Sally and Joe _____________ hard every day.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q14" id="" value="a">
										working
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q14" id="" value="b">
										work
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q14" id="" value="c">
										to work
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q14" id="" value="d">
										works
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q15" id="lm15">_______ Brian and Julie _______ the plants? In the morning.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q15" id="" value="a">
										When do / water
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q15" id="" value="b">
										Where do / waters
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q15" id="" value="c">
										When does / water
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q15" id="" value="d">
										Where does / waters
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q16" id="lm16">Pedro's two sons rarely ______ lies.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q16" id="" value="a">
										tell
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q16" id="" value="b">
										telling
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q16" id="" value="c">
										don't tell
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q16" id="" value="d">
										aren't telling
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q17" id="lm17">Italians _______ spaghetti.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q17" id="" value="a">
										love
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q17" id="" value="b">
										to love
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q17" id="" value="c">
										loving
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q17" id="" value="d">
										are loving
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q18" id="lm18">_______ Mrs. Peters? Angry.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q18" id="" value="a">
										What is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q18" id="" value="b">
										How is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q18" id="" value="c">
										How does
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q18" id="" value="d">
										What does
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q19" id="lm19">Bob _______ not ________ now.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q19" id="" value="a">
										is / run
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q19" id="" value="b">
										does runs
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q19" id="" value="c">
										is / running
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q19" id="" value="d">
										does / to run
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q20" id="lm20">I'm ______ cousin.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q20" id="" value="a">
										me
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q20" id="" value="b">
										him
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q20" id="" value="c">
										my
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q20" id="" value="d">
										his
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q21" id="lm21">________ not bread.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q21" id="" value="a">
										It
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q21" id="" value="b">
										Is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q21" id="" value="c">
										Its
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q21" id="" value="d">
										It's
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q22" id="lm22">________ Tom? Mexican.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q22" id="" value="a">
										Where does
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q22" id="" value="b">
										Where is
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q22" id="" value="c">
										What does
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q22" id="" value="d">
										What is
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q23" id="lm23">Please, _________ down.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q23" id="" value="a">
										sit
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q23" id="" value="b">
										keep
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q23" id="" value="c">
										do
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q23" id="" value="d">
										is
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q24" id="lm24">_________ the butter and the bread? In the kitchen.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q24" id="" value="a">
										What do
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q24" id="" value="b">
										What are
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q24" id="" value="c">
										Where do
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q24" id="" value="d">
										Where are
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q25" id="lm25">______ is Lee ______? China.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q25" id="" value="a">
										Where / from
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q25" id="" value="b">
										When / from
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q25" id="" value="c">
										Where / of
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q25" id="" value="d">
										When / of
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q26" id="lm26">Peter and Paul _______ French on Monday.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q26" id="" value="a">
										study
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q26" id="" value="b">
										studies
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q26" id="" value="c">
										to study
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q26" id="" value="d">
										studying
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q27" id="lm27">_______ is our new neighbor ______? Turkey.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q27" id="" value="a">
										Who / of
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q27" id="" value="b">
										Who / from
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q27" id="" value="c">
										Where / of
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q27" id="" value="d">
										Where / from
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q28" id="lm28">_______ glasses? No, they don't.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q28" id="" value="a">
										They are wearing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q28" id="" value="b">
										Are they wearing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q28" id="" value="c">
										Do they wear
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q28" id="" value="d">
										They do wear
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q29" id="lm29">_______ are Vicky and Pete ______? Washing the dishes.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q29" id="" value="a">
										How / doing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q29" id="" value="b">
										How / washing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q29" id="" value="c">
										What / doing
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q29" id="" value="d">
										What / washing
									</label>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<label for="q30" id="lm30">_______ Millie the dishes? Carefully.</label>
								<div class="radio">
									<label>
										<input type="radio" name="q30" id="" value="a">
										How is / washes
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q30" id="" value="b">
										Whom does / wash
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q30" id="" value="c">
										How does / wash
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="q30" id="" value="d">
										Whom is / washes
									</label>
								</div>
							</div>
						</li>
					</ol>
					<p class="sugerenciasLinkWrapper noprint"><a href="#" title="Lee las Reglas Gramaticales antes de checar resultados." class="reglas-gramaticales-link">Reglas gramaticales
							<span class="caret"></span></a></p>
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
						<button type="submit" class="btn btn-primary noprint" id="checkBtn">Check Answers</button>
						<span class="msg"></span>
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
<script async src="js/ingles-2-simulador.js"></script>
</body>
</html>