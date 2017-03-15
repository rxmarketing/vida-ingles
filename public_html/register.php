<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	if($user_ok == true){
		header("location: user.php?u=".$_SESSION["username"]);
		exit();
	}
	// Checks to see if username already exists in database
	if(isset($_POST["usernamecheck"])){
		// include_once("inc/db_vidainglescore_conn.php");
		$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
		sleep(2);
		$sql = "SELECT userid FROM usuarios WHERE username='$username' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$uname_check = mysqli_num_rows($query);
		if (strlen($username) < 5 || strlen($username) > 16) {
			echo '<div class="text-danger bg-danger">nombre de usuario debe ser entre 5-16 caracteres</div>';
			exit();
		}
		if (is_numeric($username[0])) {
			echo '<div class="text-danger bg-danger">nombre de usuario debe comenzar con una letra</div>';
			exit();
		}
		if ($uname_check < 1) {
			echo '<div class="text-success bg-success">' . $username . '  <img src="i/yes.png"/></div>';
			exit();
			} else {
			echo '<div class="text-danger bg-danger">' . $username . ' <img src="i/no.png"/> ya existe</div>';
			exit();
		}
	}
	if(isset($_POST["username"])){
		// include_once("inc/db_vidainglescore_conn.php");
		sleep(2);
		$u = preg_replace('#[^a-z0-9]#i', '', $_POST['username']);
		$e = mysqli_real_escape_string($db_conx, $_POST['email']);
		$p = $_POST['pass1'];
		$g = preg_replace('#[^a-z]#', '', $_POST['gender']);
		$c = preg_replace('#[^a-z ]#i', '', $_POST['country']);
		$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
		// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
		$sql = "SELECT userid FROM usuarios WHERE username='$u' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$u_check = mysqli_num_rows($query);
		// -------------------------------------------
		$sql = "SELECT userid FROM usuarios WHERE email='$e' LIMIT 1";
		$query = mysqli_query($db_conx, $sql);
		$e_check = mysqli_num_rows($query);
		// FORM DATA ERROR HANDLING
		if($u == "" || $e == "" || $p == "" || $g == "" || $c == ""){
			echo "Debes completar el formulario.";
			exit();
			} else if ($u_check > 0){
			echo "Nombre de usuario ya esta en uso";
			exit();
			} else if ($e_check > 0){
			echo '<small class="text-danger bg-danger">El correo electr&oacute;nico ya esta en uso.</small>';
			exit();
			} else if (strlen($u) < 5 || strlen($u) > 16) {
			echo "Tu nombre de usuario deber ser de 5 a 16 caracteres alfanum&eacute;ricos";
			exit();
			} else if (is_numeric($u[0])) {
			echo 'Tu nombre de usuario no debe comenzar con un n&uacute;mero';
			exit();
			} else {
			// END FORM DATA ERROR HANDLING
			$p_hash = hash('SHA512',$p);
			$sql = "INSERT INTO usuarios (username, email, password, gender, country, ip, signupdate, lastlogin) VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now())";
			$query = mysqli_query($db_conx, $sql);
			$uid = mysqli_insert_id($db_conx);
			// Establish their row in the useroptions table
			$sql = "INSERT INTO opciones_usuarios (opcion_id, username) VALUES ('$uid','$u')";
			$query = mysqli_query($db_conx, $sql);
			if (!file_exists("users/$u")) {
				mkdir("users/$u", 0755);
			}
			$to = "$e";
			$from = "auto_responder@vidaingles.com";
			$subject = ''.$u.' activa tu cuenta de Vida Ingles';
			$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Activa tu cuenta de Vida Ingles</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:20px; color:#CCC;"><a href="http://vidaingles.com"><img src="http://vidaingles.com/i/vidaingles-logo50x50.png" width="36" height="30" alt="Vida Ingl&eacute;s" style="border:none; float:left;"></a>&nbsp;Activaci&oacute;n de cuenta Vida Ingl&eacute;s </div><div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Clic abajo para activar tu cuenta:<br /><br /><a href="http://vidaingles.com/inc/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'"><button style="background-color:rgb(73, 17, 126);color:#fff;padding:8px;font-size:15px;">Clic aqu&iacute; para activar tu cuenta</button></a><br /><br />Despu&eacute;s de activar tu cuenta podr&aacute;s iniciar sesi&oacute;n con tu correo electr&oacute;nico y contrase&ntilde;a:<br /><br /> Tu correo electr&oacute;nico: <b>'.$e.'</b><br />Tu contrase&ntilde;a: <em>la que creaste</em><br /><br /><br />Un cordial saludo,<br /><br />Ricardo Maldonado<br /><small>Gerente de operaciones.</small></div></body></html>';
			$headers = "From: $from\n";
			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
			mail($to, $subject, $message, $headers);
      // $to = "ricardo@vidaingles.com";
			// $from = "auto_responder@vidaingles.com";
			// $subject = 'Nuevo usuario a Vida Ingles';
			// $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Tiene un nuevo registro</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:20px; color:#CCC;"><a href="http://vidaingles.com"><img src="http://vidaingles.com/images/vidaingles-logo50x50.png" width="36" height="30" alt="Vida Ingl&eacute;s" style="border:none; float:left;"></a>Vida Ingl&eacute;s Nuevo registro</div><div style="padding:24px; font-size:17px;">Hello Ricardo,<br /><br />Esta es el dato:<br /><br /><a href="http://www.vidaingles.com/vi_activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$p_hash.'">Clic aqu&iacute; para activar tu cuenta ahora<br /><br />Despues de activar tu cuenta puedes iniciar sesi&oacute;n con tu:<br />* Correo electr&oacute;nico: <b>'.$e.'</b></div></body></html>';
			// $headers = "From: $from\n";
			// $headers .= "MIME-Version: 1.0\n";
			// $headers .= "Content-type: text/html; charset=iso-8859-1\n";
			// mail($to, $subject, $message, $headers);
			echo "register_success";
			exit();
		}
		exit();
	}
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Reg&iacute;strate a Vida Ingl&eacute;s</title>
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			body {
			height: 100%;
			}
			body {
			.padding-top: 100px;
			.padding-bottom: 40px;
			background-color: #eee;
			}
			.form-register {
			max-width: 430px;
			padding: 15px;
			margin: 20px auto;
			background-color: #fff;
			border: 1px solid #d2d2d2;
			border-radius: 8px;
			}
			.form-register .form-register-heading,
			.form-register .checkbox {
			margin-bottom: 10px;
			}
			.form-register .checkbox {
			font-weight: normal;
			}
			.form-register .form-control {
			position: relative;
			font-size: 16px;
			height: auto;
			padding: 10px;
			margin-bottom: 10px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			}
			.form-register .form-control:focus {
			z-index: 2;
			}
			.form-register input[type="email"], .form-register input[type="text"] {
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
			}
			.form-register input[type="password"],.form-register select {
			border-top-left-radius: 0;
			border-top-right-radius: 0;
			}
			.text-login {
			padding-top:15px;
			}
			#wrap {
			min-height: 100%;
			height: auto;
			/* Negative indent footer by its height */
			margin: 0 auto -60px;
			/* Pad bottom by footer height */
			padding: 0 0 60px;
			}
			#footer {
			height: 60px;
			background-color: #f5f5f5;
			}
		</style>
	</head>
	<body>
		<header id="header-wrap" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<?php echo $log_user_pic .'<span class="caret"></span>' ?>
						<span class="sr-only">Toggle navigation</span>
					</button>
					<img class="logo" src="i/vidaingles-logo50x50.png" width="25" height="25" alt="Vida Ingl&eacute;s"/> <a class="navbar-brand" href="<?php echo home() ?>">Vida Ingl&eacute;s</a>
				</div><!-- Ends navbar-header -->
				<?php //include_once('vi_templates/vi_template_login_links.php') ?>
			</div><!--Ends container -->
		</header>
		<!-- Ends header ========
		=======================================-->
		<div id="wrap">
			<div class="container bg-register">
				<div id="formDiv">
					<form method="post" class="form-register" name="signupform" id="signupform" role="form">
						<h2 class="form-register-heading">Reg&iacute;strate</h2>
						<h4 class="text-muted">Es gr&aacute;tis</h4>
						<div><label for="username" class="control-label">Crea tu nombre de usuario</label></div>
						<input id="username" name="username" class="form-control" autofocus="" type="text" placeholder="Crea tu nombre de usuario" maxlength="16">
						<div id="unamestatus"></div>
						<div class=""><label for="email" class="control-label">Tu correo electr&oacute;nico</label></div>
						<input id="email" name="email" class="form-control" type="email" placeholder="Tu correo electr&oacute;nico" maxlength="88" />
						<div id="email_msg"></div>
						<div><label for="pass1"class="control-label">Crea tu contrase&ntilde;a</label></div>
						<input id="pass1" name="pass1" class="form-control" type="password" placeholder="Nueva contrase&ntilde;a" maxlength="16"/>
						<div>
						<label for="pass2"class="control-label">Escribe otra vez tu contrase&ntilde;a</label></div>
						<input id="pass2" name="pass2" class="form-control" type="password" placeholder="Escribe de nuevo tu contrase&ntilde;a" maxlength="16"/>
						<div>
						<label for="gender" class="control-label">Sexo</label></div>
						<select id="gender" name="gender" class="form-control">
							<option value=""></option>
							<option value="m">Hombre</option>
							<option value="f">Mujer</option>
							<option value="f">Otro</option>
						</select>
						<div>
						<label for="country" id="" class="control-label">Pa&iacute;s</label></div>
						<select id="country" name="country" class="form-control">
							<option value=""></option>
							<?php include_once('templates/template_country_list.php'); ?>
						</select>
						<div class="termsLink">
							<small><a href="#">T&eacute;rminos y Condiciones</a></small>
						</div>
						<div id="terms" class="well" style="display:none">
							<h5 id="terms-header">Pol&iacute;ticas de Uso de Vida Ingl&eacute;s</h5>
							<small>
								<p>Al hacer clic en Reg&iacute;strate, muestras tu conformidad con nuestras Condiciones y aceptas haber leido nuestra Pol&iacute;tica de uso.</p>
								<p>El presente documento enumera los T&eacute;rminos y Condiciones del servicio ofrecido por el sitio Web VidaIngles.com (El Sitio) a toda persona (el Visitante) que navegue por las p&aacute;ginas del mencionado sitio, as&iacute; como a todo usuario registrado al sitio (el Usuario). Enti&eacute;ndase por "Servicio" la consulta de toda p&aacute;gina HTML o PHP perteneciente al dominio "VidaIngles.com" (y sus respectivos sub-dominios) as&iacute; como las herramientas de publicaci&oacute;n de contenidos e intercambio de mensajes ofrecidas a todo usuario registrado. Todo Visitante deber&aacute; someterse a los T&eacute;rminos y Condiciones aqu&iacute; enumerados. El no cumplimiento de dicha obligaci&oacute;n podr&aacute; resultar en la cancelaci&oacute;n pura y simple de la cuenta del Usuario.</p>
								<p>T&eacute;rminos y Condiciones:</p>
								<ul class="list-unstyled">
									<li>	El Visitante se compromete a utilizar el Sitio para fines personales y no comerciales. Toda persona menor de 13 a&ntilde;os deber&aacute; contar con la autorizaci&oacute;n de sus padres o tutores legales para visitar y/o registrarse al Sitio.</li>
									<li>Al registrarse al Sitio, el Usuario se compromete a proporcionar informaci&oacute;n ver&iacute;dica sobre su perfil y estar&aacute; obligado a mantener dicha informaci&oacute;n actualizada. Queda estrictamente prohibida la usurpaci&oacute;n de identidad. Todo usuario que incurra en dicha infracci&oacute;n ser&aacute; excluido inmediatamente del Sitio.</li>
									<li>El Usuario se compromete a publicar en el Sitio &uacute;nicamente contenidos de su autor&iacute;a. Al enviar contenido el Usuario da licencia al Sitio para publicar dicho contenido a trav&eacute;s de sus p&aacute;ginas de manera ilimitada. En ning&uacute;n momento el Sitio exigir&aacute; exclusividad por parte del Usuario: la propiedad intelectual del contenido enviado permanecer&aacute; en manos del Usuario, quien ser&aacute; libre de publicar sus contenidos en cualquier otro medio, incluidos otros sitios web. El Usuario es libre de retirar del Sitio los contenidos de su autor&iacute;a en cualquier momento, sin requerir bajo ninguna circunstancia la autorizaci&oacute;n del Sitio.</li>
									<li>El Usuario se compromete a no enviar ning&uacute;n tipo de contenido que viole las leyes vigentes en su pa&iacute;s de residencia. El usuario se compromete a no publicar material ofensivo incluyendo, pero no limitado a: im&aacute;genes, video, texto o ficheros de audio con car&aacute;cter pornogr&aacute;fico, demasiado violento o que pueda causar da&ntilde;o psicol&oacute;gico a otros Visitantes (en especial a los menores de edad). Igualmente se proh&iacute;be la publicaci&oacute;n de contenidos que inciten al odio o la violencia, anuncios que promuevan la compra/venta de armamento, explosivos, f&aacute;rmacos, bebidas alcoh&oacute;licas o cualquier otra sustancia controlada, que promuevan la prostituci&oacute;n, art&iacute;culos robados, de contrabando o cuya procedencia no pueda ser determinada, contenidos que promuevan programas que faciliten la pirater&iacute;a inform&aacute;tica, enlaces hac&iacute;a sitios o programas que instalen virus o cualquier otro programa inform&aacute;tico que pueda da&ntilde;ar el ordenador (computadora) de otros Visitantes. Queda prohibida la utilizaci&oacute;n de las herramientas de publicaci&oacute;n de contenidos del Sitio para promover rifas, sorteos o cualquier otro tipo de concurso con fines lucrativos que no cuenten con las autorizaciones legales correspondientes.</li>
									<li>Como parte del Servicio, el Usuario tiene la posibilidad de enviar mensajes en los foros y de publicar comentarios en las p&aacute;ginas. El Sitio no se hace responsable del contenido de dichos textos, pero se compromete a eliminarlos en cuanto una infracci&oacute;n a los presentes T&eacute;rminos y Condiciones le sea se&ntilde;alada. Todo comportamiento que sea considerado como abusivo o que viole los presentes T&eacute;rminos y Condiciones podr&aacute; resultar en la cancelaci&oacute;n de la cuenta del Usuario.</li>
									<li>Queda estrictamente prohibida la copia de los contenidos publicados en el Sitio. En lo que se refiere a las lecciones, estos contenidos son trabajo propio de sus autores y representan su interpretaci&oacute;n personal del idioma. Las lecciones, ejercicios contenidos en el Sitio son para exclusivo uso privado, por lo que se prohibe su reproducci&oacute;n o retransmisi&oacute;n, as&iacute; como su uso para fines comerciales.</li>
									<li>El Sitio no se hace responsable de las consecuencias que la publicaci&oacute;n de ciertos contenidos por parte del Sitio o Usuario pueda causarle a &eacute;l o a terceras personas. No obstante, el Sitio se compromete a eliminar o modificar inmediatamente todo contenido que sea err&oacute;neo o considerado como abusivo o que no respete los T&eacute;rminos y Condiciones enumerados en este documento.</li>
									<li>La direcci&oacute;n de correo electr&oacute;nico proporcionada por el Usuario es considerada por el Sitio como el &uacute;nico medio de comunicaci&oacute;n v&aacute;lido con el Usuario. El Sitio se compromete a no comunicar la direcci&oacute;n de correo electr&oacute;nico de los Usuarios, a menos que estos incluyan dicha informaci&oacute;n en el material que ellos mismos publican a trav&eacute;s del sitio. En ning&uacute;n momento el Sitio enviar&aacute; mensajes a sus Usuarios para ning&uacute;n otro tema que no est&eacute; relacionado con la tem&aacute;tica o el funcionamiento del Sitio.</li>
									<li>El Usuario no utilizar&aacute; las facilidades que ofrece el Sitio como "repositorio", es decir, que sirvan como almacenamiento de datos para acceder a ellos de cualquier otra forma que no sea a trav&eacute;s de las p&aacute;ginas del Sitio. De igual manera, queda prohibido el "acceso remoto" a los contenidos del sitio, defini&eacute;ndose "acceso remoto" como la inclusi&oacute;n de URIs (Universal Remote Identifiers) que apunten directamente a contenidos internos del Sitio, como im&aacute;genes y/o archivos de audio, desde p&aacute;ginas web ajenas al Sitio.</li>
									<li>El Sitio se reserva el derecho de cancelar la cuenta del Usuario sin previo aviso y sin la obligaci&oacute;n de dar explicaciones al Usuario excluido sobre las razones que llevaron a la cancelaci&oacute;n de su cuenta. Dicha acci&oacute;n podr&aacute; darse esencialmente como consecuencia del no respeto a los presentes T&eacute;rminos y Condiciones.</li>
									<li>El Visitante acepta el Servicio "tal cual es". El Sitio se compromete a mantener altos niveles de disponibilidad, pero en ning&uacute;n momento podr&aacute; ser juzgado responsable de cualquier interrupci&oacute;n, ya sea temporal o permanente, del servicio. Los responsables del Sitio se reservan el derecho de clausurar parcial o totalmente el Sitio por razones t&eacute;cnicas, econ&oacute;micas o legales, sin tener obligaci&oacute;n de explicar dichas razones a los Usuarios del Sitio.</li>
									<p>&copy; VidaIngles.com</p>
								</ul>
							</small>
						</div>
						<br />
						<button id="signupbtn" class="btn btn-primary" data-loading-text="Procesando...">Reg&iacute;strate</button>
						<span id="aviso"></span>
						<div class="small text-login">&iquest;Ya eres usuario? <a href="login.php">inicia sesi&oacute;n</a></div>
					</form>
				</div>
				<!-- Ends formDiv -->
			</div>
			<!-- Ends container bg-register -->
		</div>  <!-- Ends wrap -->
		<!--- FOOTER
		======================================================-->
		<footer class="footer">
      <div class="container">
				<div class="microdata">
					<a href="<?php echo home(); ?>">&copy; <?php echo date('Y'); ?><span itemscope itemtype="http://schema.org/Organization"></span> <span itemprop="name">Vida Inglés</span></a>
				</div><!-- Ends microdata -->
			</div>
		</footer>
		<script src="<?php echo home() ?>/js/register.js"></script>
		<script src="<?php echo home() ?>/js/ie10-viewport-bug-workaround.js"></script>
		<?php include_once('includes/ga.php') ?>
	</body>
</html>	