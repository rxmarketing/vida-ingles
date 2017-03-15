<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
?>
<!doctype html>
<html lang="es">
	<head>
		<title>Contacto</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="Author" content="Ricardo Maldonado" />
		<meta name="keywords" content="contacto, contactar, vida ingles, vida, ingles" />
		<meta name="description" content="Completa el formulario" />
		<meta property="fb:app_id" content="382987081744830" />  
		<meta property="fb:admins" content="1335978648" />  
		<meta property="og:url" content=""/>  
		<meta property="og:title" content="Contacto Vida Ingles" />
		<meta property="og:description" content="" />
		<meta property="og:type" content="article" />  
		<meta property="og:image" content="" />
		<link rel="canonical" href="<?php home(); ?>/contacto.php" />
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
		<!-- MAIN CONTENT ======================================================== -->
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1>&iquest;En que podemos ayudarte?</h1>
					<p>Completa el formulario</p>
					<div class="col-md-6">
						<form method="post" id="msgFrm" name="msgFrm" role="form" class="form">
							<div class="form-group">
								<label for="msg_nombres" class="control-label">Nombres *</label>
								<input type="text" name="msg_nombres" id="msg_nombres" class="form-control" placeholder="Nombre" autofocus/>
							</div>
							<div class="form-group">
								<label for="msg_apellidos" class="control-label">Apellidos *</label>
								<input type="text" name="msg_apellidos" id="msg_apellidos" class="form-control" placeholder="Apellido"/>
							</div>
							<div class="form-group">
								<label for="msg_email" class="control-label">Correo electrónico *</label>
								<input type="email" name="msg_email" id="msg_email" class="form-control" placeholder="Escribe tu correo electrónico"/>
							</div>
							<div class="form-group">
								<label for="msg_cel" class="control-label">Celular <small>(opcional)</small></label>
								<input type="text" name="msg_cel" id="msg_cel" class="form-control" maxlength="10" placeholder="Teléfono celular (opcional)"/>
							</div>
							<div class="form-group">
								<label for="msg_asunto" class="control-label">Asunto *</label>
								<select name="msg_asunto" id="msg_asunto" class="form-control">
									<option value="" disabled selected>--- Elige uno de la lista ---</option>
									<?php echo lista_asuntos($db_conx); ?>
								</select>
							</div>
							<div class="form-group">
								<label for="msg_mensaje" class="control-label">Mensaje *</label>
								<textarea name="msg_mensaje" id="msg_mensaje" placeholder="Escribe aqui tu mensaje" cols="30" rows="6" class="form-control">
								</textarea>
							</div>
							<input type="hidden" name="msg_userid" id="msg_userid" value="<?php echo $log_id; ?>"/>
							<input type="hidden" name="msg_logemail" id="msg_logemail" value=""/>
							<button id="msgBtn" class="btn">Enviar</button>
							<span id="aviso"></span>
						</form>
					</div>
				</div>
				<!-- SIDE BAR 
				======================================================-->
				<div class="col-md-4">
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
		<script src="<?php echo home() ?>/js/contacto.js"></script>
	</body>
</html>								