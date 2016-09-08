<?php 
	include('functions.php') 
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="og:url"           content="<?php echo canonical() ?>"/>
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Conjugacion del verbo be" />
		<meta property="og:description"   content="Ejercicios de Inglés" />
		<meta property="og:image"         content="" />
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Conjugacion del verbo be</title>
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
							<h3>Conjugación del verbo <em>be</em></h3>
							<div class="fb-like"></div>
							<div class="form-inline">
								<div class="form-group">
									<label for="nombre">Nombre: </label> <input type="text" autofocus="" class="form-control" id="nombre" placeholder="Primer nombre"/>
								</div>
								<div class="form-group">
									<label for="nombre">Apellido: </label> <input type="text" class="form-control" id="apellido" placeholder="Primer apellido"/>
								</div>
							</div>
							<h4>Conjuga el verbo <em>be</em> forma positiva.</h4>
							<table class="table">
								<th>Positive Full Form</th><th>Positive Short Form</th>
								<tr>
									<td>	<input type="text" class="form-control" id="q1" placeholder="I / be."></td>
									<td><input type="text" class="form-control" id="q2" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q3" placeholder=""></td>
									<td><input type="text" class="form-control" id="q4" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q5" placeholder=""></td>
									<td><input type="text" class="form-control" id="q6" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q7" placeholder=""></td>
									<td><input type="text" class="form-control" id="q8" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q9" placeholder=""></td>
									<td><input type="text" class="form-control" id="q10" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q11" placeholder=""></td>
									<td><input type="text" class="form-control" id="q12" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q13" placeholder=""></td>
									<td><input type="text" class="form-control" id="q14" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q15" placeholder="They / be"></td>
									<td><input type="text" class="form-control" id="q16" placeholder=""></td>
								</tr>
							</table>
							<h4>Conjuga el verbo <em>be</em> forma <i>negativa</i>.</h4>
							<table class="table">
								<th>Negative Full Form</th><th>Negative Short Form 1</th><th>Negative Short Form 2</th>
								<tr>
									<td>	<input type="text" class="form-control" id="q17" placeholder="I / be."></td>
									<td><input type="text" class="form-control" id="q18" placeholder=""></td>
									<td><input type="text" class="form-control" id="q19" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q20" placeholder=""></td>
									<td><input type="text" class="form-control" id="q21" placeholder=""></td>
									<td><input type="text" class="form-control" id="q22" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q23" placeholder=""></td>
									<td><input type="text" class="form-control" id="q24" placeholder=""></td>
									<td><input type="text" class="form-control" id="q25" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q26" placeholder=""></td>
									<td><input type="text" class="form-control" id="q27" placeholder=""></td>
									<td><input type="text" class="form-control" id="q28" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q29" placeholder=""></td>
									<td><input type="text" class="form-control" id="q30" placeholder=""></td>
									<td><input type="text" class="form-control" id="q31" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q32" placeholder=""></td>
									<td><input type="text" class="form-control" id="q33" placeholder=""></td>
									<td><input type="text" class="form-control" id="q34" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q35" placeholder=""></td>
									<td><input type="text" class="form-control" id="q36" placeholder=""></td>
									<td><input type="text" class="form-control" id="q37" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q38" placeholder="They / be"></td>
									<td><input type="text" class="form-control" id="q39" placeholder=""></td>
									<td><input type="text" class="form-control" id="q40" placeholder=""></td>
								</tr>
							</table>
							<h4>Forma <i>interrogativa.</i></h4>
							<table class="table">
								<th>Question Full Form</th>
								<tr>
									<td>	<input type="text" class="form-control" id="q41" placeholder="I / be."></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q42" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q43" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q44" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q45" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q46" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q47" placeholder=""></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control" id="q48" placeholder="They / be"></td>
								</tr>
							</table>
							<br />
							<button type="submit" class="btn btn-primary" id="checkBtn">Check Answers</button> <span class="msg"></span>
						</form>
					</section>
					<?php include_once('includes/app_ads.php') ?>
				</div>
				<div class="col-md-3 marketing">
					<?php include_once('includes/nav-links.php') ?>
				</div>
				<div class="fb-share-button" data-href="<?php echo canonical() ?>" data-layout="button_count"></div>
			</div><!-- Ends container -->
		</div>
		<?php include('includes/template_footer.php') ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<p> </p>
				</div>
			</div>
		</div>
		<?php include_once('includes/fb-sdk.php') ?>
		<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="js/app.js"></script>
		<script type="text/javascript" src="js/conjugacion_verbo_be.js"></script>
	</body>
</html>