<?php 
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	if($user_ok !== true){
    header("location: login.php");
    exit();	
	}
?>
<!doctype html>
<html lang="es">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cambiar contraseña</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" href="css/vi_core.css" media="screen" />
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/changepass.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<div class="container" id="content">
			<div class="row">
				<!-- BEGINS MAIN-CONTENT-LEFT ======================================================-->
				<div class="col-md-8" id="main-content-left">
					<!-- ================== BEGINS EDITABLE SECTION ==================================================================-->
					<form id="changepassFrm" name="changepassFrm" class="form-signin" role="form">
						<h2 class="form-signin-heading">Cambiar contraseña</h2>
						<div id="npasswordaviso"></div>
						<label for="npassword" id=""  class="control-label">Nueva contraseña</label>
						<input type="password" name="npassword" id="npassword" size="20" autocomplete="off" class="form-control data" placeholder="Escribe nueva contraseña" autofocus />
						
						<div id="cpasswordaviso"></div>
						<label for="cpassword" id="cpasswordLabel" class="control-label">Escribe otra vez contraseña</label>
						<input type="password" name="cpassword" id="cpassword" size="20" autocomplete="off" class="form-control data" placeholder="Escribe contraseña otra vez"/>
						
						<button id="btn-changepass" class="btn btn-lg btn-primary btn-block">Cambiar contraseña</button>
						<br />
						<div id="changepassaviso"></div>
						<div class="small text-login"></div>
						
					</form>
					
					
					<!-- ==================== ENDS EDITABLE SECTION ================================================================== -->
				</div> <!-- ends main-content-left div -->
				<!-- BEGINS SIDE BAR RIGHT -->
				<div class="col-md-4 noprint" id="sidebar-right">
					<!-- ==================== BEGINS SIDEBAR-RIGHT EDITABLE SECTION ================================================== -->
					<?php include_once('templates/template_sidebar_right.php')?>			
					<!-- ==================== ENDS SIDEBAR-RIGHT EDITABLE SECTION =================================================== -->
				</div><!-- ends sidebar-right -->
			</div> <!-- ends row class div -->
		</div> <!-- ends content container -->
		<!--- FOOTER ======================================================-->
		<footer class="footer">
			<div class="container">
				<!-- ==================== BEGINS FOOTER EDITABLE SECTION ======================================================== -->
				<?php include_once('templates/template_footer.php') ?>
			</div>
		</footer>
	</body>
</html>