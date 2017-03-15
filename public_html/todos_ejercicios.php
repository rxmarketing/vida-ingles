<?php
	include_once('inc/checar_sesion.php');
	include_once('inc/functions.php');
	$todosejercicios_list = "";
	$sql = "SELECT * FROM ejercicios";
	$qry = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
		$todosejercicioid = $row['ejer_id'];
		$todosejerciciocefid = $row['cef_level'];
		$todosejercicionombre = $row['ejer_nombre'];
		$todosejerciciofriendly = $row["ejer_friendly_name"];
		$todosejercicioinstrucciones = $row['ejer_instrucciones'];
		
		$todosejercicios_list .= '<li class="media">
		<div class="media‐left">
		
	</div>
		<div class="media‐body">
		<h3 class="media‐heading"><a href="http://vidaingles.com/ejercicios/'.$todosejercicioid.'/'.$todosejerciciofriendly.'">' .$todosejercicionombre . '</a></h3>
		'.$todosejercicioinstrucciones.' ... '.'<a href="http://vidaingles.com/ejercicios/'.$todosejercicioid.'/'.$todosejerciciofriendly.'">[do it now]</a>
		</div>
		</li>';
	}
?>
<!DOCTYPE HTML>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Todos los ejercicios</title>
		<?php include('css/css_includes.php') ?>
		<?php include('js/javascript_includes.php') ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<div id="msg"></div>
		<!-- SHOWCASE
		=======================================================-->
		<?php echo $showcase; ?>
		<div class="container" id="vi_content">
			<div class="row">
				<!-- BEGINS MAIN-CONTENT-LEFT ======================================================-->
				<div class="col-md-8" id="main-content-left">
					<!-- ================== BEGINS MAIN-CONTENT-LEFT EDITABLE SECTION =============================================-->
					<h1 class="mute">Ejercicios</h1>
					<ul class="media-list">
						<?php echo $todosejercicios_list; ?>
					</ul>
					<!-- ==================== ENDS MAIN-CONTENT-LEFT EDITABLE SECTION ===================================== -->
				</div> <!-- ends main-content-left div -->
				<!-- BEGINS SIDE BAR RIGHT -->
				<div class="col-md-4 noprint" id="sidebar-right">
					<!-- ==================== BEGINS SIDEBAR-RIGHT EDITABLE SECTION ================================ -->
					<?php include_once('templates/template_sidebar_right.php') ?>
					<!-- ==================== ENDS SIDEBAR-RIGHT EDITABLE SECTION =============================== -->
				</div><!-- ends sidebar-right -->
			</div> <!-- ends row class div -->
		</div> <!-- ends content container -->
		<footer class="footer">
			<div class="container">
				<!-- ==================== BEGINS FOOTER EDITABLE SECTION ========================================= -->
				<?php include_once('templates/template_footer.php') ?>
				<!-- ==================== ENDS EDITABLE SECTION ================================================================ -->
			</div>
		</footer>
	</body>
</html>