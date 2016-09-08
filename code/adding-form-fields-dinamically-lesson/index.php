<?php
	//require_once('functions.php')
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Adding Form Fields Dinamically Lesson</title>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/jquery-ui.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/vi_print.css" media="print"/>
		<script src="http://localhost/vidaingles/js/jquery-1.11.3.min.js"></script>
		<script src="http://localhost/vidaingles/js/bootstrap.min.js"></script>
		<script src="http://localhost/vidaingles/js/jquery-ui.min.js"></script>
		<script src="http://localhost/vidaingles/js/timeago.js"></script>
		<style type="text/css">
			footer {
			height: 60px;
			background-color: #f5f5f5;
			padding: 15px;
			}
			form {
			width: 400px;
			border: 1px solid #eee;
			padding: 10px;
			}
		</style>
		<script>
			$(function(){
				$('#add').click(function()
{
var str = '<li>';
str+= '<label>Name</label><input type="text" value=""/> ';
str+= '<input type="button" value="remove" class="remove"/>';
str+= '</li>';
$('#sites').append(str);
});
$('.remove').live('click', function()
{
$(this).parent('li').remove();
});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<h4 class="">Vida Inform&aacute;tica.com</h4>
			<h1 class="page-header">Adding Form Fields Dinamically Lesson</h1>
			<small>Lenguajes: html5, CSS3, PHP, jQuery</small>
			<h2>Preparaci&oacute;n</h2>
			<p>Crea dos archivos</p>
			<ol>
				<li>index.php</li>
				<li>process.php</li>
			</ol>
			<h2>C&oacute;mo hacerlo</h2>
			<ol>
				<li>Abre <em>index.php</em> y teclea el siguiente codigo:</li>
				<code>
					<pre>

					</pre>
				</code>
				<form action="process.php" method="post">
<fieldset>
<legend>Websites you visit daily</legend>
<ul id="sites">
<li>
<label>Name</label><input type="text" value=""/>
</li>
</ul>
<input type="button" id="add" value="Add More"/>
</fieldset>
</form>


				<li>Ahora, incluye jQuery y escribe el siguiente codigo para el evento <em>click</em> del boton.</li>
				<code>
					<pre>

					</pre>
				</code>
				<li>Abre <em>process.php</em> y escribe el siguiente codigo:</li>
				<code>
					<pre>

					</pre>
				</code>
				<li>Abre <em>index.php</em> en tu navegador y completa el formulario y luego clic el boton <em>Enviar</em>. El formulario se oculta y podras ver los valores de la siguiente manera: <br />
					<p id="response" class="bg-success" style="display: block;">Hola <strong>Brenda Maldonado</strong>, Tu informaci&oacute;n de contacto ha sido guarda. Nos has enviado la siguiente informaci&oacute;n: <br><strong>E-mail:</strong> brenda@gmail.com<br><strong>Sexo:</strong> Mujer<br><strong>Pa&iacute;s:</strong> Mexico</p>
				</li>
			</ol>
			<div class="container">
        <div class="row">
					<div class="col-lg-12">
						<footer>
							<p class="pull-right"><a href="#top">Back to top</a></p>
							<p>&copy; <?php echo date('Y') ?> Vida Inform&aacute;tica &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
						</footer>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>