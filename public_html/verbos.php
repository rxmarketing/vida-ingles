<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
?>
<!doctype html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lista de Verbos Regulares e Irregulares</title>
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- SHOWCASE =======================================================-->
		<?php echo $showcase ?>
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<!-- BEGINS MAIN-CONTENT-LEFT ======================================================-->
				<div class="col-md-8" id="main-content-left">
					<!-- ================== BEGINS MAIN-CONTENT-LEFT EDITABLE SECTION ===================================-->
					<h1 class="mute ucase-text">Lista de Verbos</h1>
					<h3 id="exam-name">Verbos Irregulares</h3>
					<div id="lista-verbos">
						<h4>Categoria 1. Iguales las tres formas</h4>
						<div>
							<table class="table">
								<thead>
									<tr>
										<th>Forma Base</th>
										<th>Pasado Simple</th>
										<th>Pasado Participio</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $verb1_list ?>
								</tbody>
							</table>
						</div>
						<h4>Categoria 2. Iguales el pasado y el participio pasado</h4>
						<div>
							<table class="table">
								<thead>
									<tr>
										<th>Forma Base</th>
										<th>Pasado Simple</th>
										<th>Pasado Participio</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $verb2_list ?>
								</tbody>
							</table>
						</div>
						<h4>Categoria 3. Las tres formas diferentes</h4>
						<div>
							<table class="table">
								<thead>
									<tr>
										<th>Forma Base</th>
										<th>Pasado Simple</th>
										<th>Pasado Participio</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $verb3_list ?>
								</tbody>
							</table>
						</div>
					</div>
                    <h3 id="exam-name">Verbos Regulares</h3>
                        <h4></h4>
						<div>
							<table class="table">
								<thead>
									<tr>
										<th>Forma Base</th>
										<th>Pasado Simple</th>
										<th>Pasado Participio</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $verb_r_list; ?>
								</tbody>
							</table>
						</div>
					<!-- ==================== ENDS MAIN-CONTENT-LEFT EDITABLE SECTION ================================================================== -->
				</div> <!-- ends main-content-left div -->
				<!-- BEGINS SIDE BAR RIGHT -->
				<div class="col-md-4 noprint" id="sidebar-right">
					<!-- ==================== BEGINS SIDEBAR-RIGHT EDITABLE SECTION ======================================== -->
					<?php include_once('templates/template_sidebar_right.php'); ?>
					<!-- ==================== ENDS SIDEBAR-RIGHT EDITABLE SECTION =================================================== -->
				</div><!-- ends sidebar-right -->
			</div> <!-- ends row class div -->
		</div> <!-- ends content container -->
		<!--- FOOTER ======================================================-->
		<footer class="footer">
			<div class="container">
				<?php include_once('templates/template_footer.php'); ?>
			</div>
		</footer>
	</body>
</html>