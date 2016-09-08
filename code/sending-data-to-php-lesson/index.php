<?php
	//require_once('functions.php')
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Sending Data to PHP Lesson</title>
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
				$('#response').hide();
$('input:button').click(function(e){
	e.preventDefault();
	var data = $('form:first').serialize();
	$.post('process.php',data,function(data){
		$('#information').hide();
		$('#response').html(data).show();
	},
	'html'
	);
});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<h4 class="">Vida Inform&aacute;tica.com</h4>
			<h1 class="page-header">Lecci&oacute;n: Enviar Datos Atravez de <em>Post</em> a PHP</h1>
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
&lt;form id=&quot;information&quot;&gt;
	&lt;div class=&quot;form-group&quot;&gt;
		&lt;label&gt;Correo electronico:&lt;/label&gt;
		&lt;input class=&quot;form-control&quot; type=&quot;text&quot; name=&quot;email&quot;/&gt;
	&lt;/div&gt;
	&lt;div class=&quot;form-group&quot;&gt;
		&lt;label&gt;Nombre completo&lt;/label&gt;
		&lt;input class=&quot;form-control&quot; type=&quot;text&quot; name=&quot;nombrecompleto&quot;/&gt;
	&lt;/div&gt;
	&lt;label for=&quot;&quot;&gt;Sexo&lt;/label&gt;
	&lt;div class=&quot;radio&quot;&gt;
		&lt;label&gt;
			&lt;input type=&quot;radio&quot; name=&quot;sexo&quot; value=&quot;Hombre&quot; checked=&quot;checked&quot;/&gt;
			Hombre
		&lt;/label&gt;
	&lt;/div&gt;
	&lt;div class=&quot;radio&quot;&gt;
		&lt;label for=&quot;&quot;&gt;
			&lt;input type=&quot;radio&quot; name=&quot;sexo&quot; value=&quot;Mujer&quot;/&gt;Mujer
		&lt;/label&gt;
	&lt;/div&gt;
	&lt;div class=&quot;form-group&quot;&gt;
		&lt;label&gt;Pa&iacute;s&lt;/label&gt;
		&lt;select class=&quot;form-control&quot; name=&quot;pais&quot;&gt;
			&lt;option value=&quot;Mexico&quot;&gt;Mexico&lt;/option&gt;
			&lt;option value=&quot;Canada&quot;&gt;Canada&lt;/option&gt;
			&lt;option value=&quot;USA&quot;&gt;USA&lt;/option&gt;
		&lt;/select&gt;
	&lt;/div&gt;
	&lt;input type=&quot;button&quot; value=&quot;Enviar&quot; name=&quot;submit&quot;/&gt;
&lt;/form&gt;
	&lt;p id=&quot;response&quot;&gt;&lt;/p&gt;
					</pre>
				</code>
				<form id="information">
	<div class="form-group">
		<label>Correo electr&oacute;nico:</label>
		<input class="form-control" type="text" name="email"/>
	</div>
	<div class="form-group">
		<label>Nombre completo</label>
		<input class="form-control" type="text" name="nombrecompleto"/>
	</div>
	<label for="">Sexo</label>
	<div class="radio">
		<label>
			<input type="radio" name="sexo" value="Hombre" checked="checked"/>
			Hombre
		</label>
	</div>
	<div class="radio">
		<label for="">
			<input type="radio" name="sexo" value="Mujer"/>Mujer
		</label>
	</div>
	<div class="form-group">
		<label>Pa&iacute;s</label>
		<select class="form-control" name="pais">
			<option value="Mexico">Mexico</option>
			<option value="Canada">Canada</option>
			<option value="USA">USA</option>
		</select>
	</div>
	<input type="button" value="Enviar" name="submit"/>
</form>
	<p id="response" class="bg-success"></p>
				<li>Ahora, incluye jQuery y escribe el siguiente codigo para el evento <em>click</em> del boton.</li>
				<code>
					<pre>
$('#response').hide();
$('input:button').click(function(e){
	e.preventDefault();
	var data = $('form:first').serialize();
	$.post('process.php',data,function(data){
		$('#information').hide();
		$('#response').html(data).show();
	},
	'html'
	);
});
					</pre>
				</code>
				<li>Abre <em>process.php</em> y escribe el siguiente codigo:</li>
				<code>
					<pre>
&lt;?php
$responseString = 'Hola &lt;strong&gt;'.$_POST['nombrecompleto'].'&lt;/strong&gt;, Tu informaci&amp;oacute;n de contacto ha sido guarda. ';
$responseString.= 'Nos has enviado la siguiente informaci&amp;oacute;n: ';
$responseString.= '&lt;br/&gt;';
$responseString.= '&lt;strong&gt;E-mail:&lt;/strong&gt; '.$_POST['email'];
$responseString.= '&lt;br/&gt;';
$responseString.= '&lt;strong&gt;Sexo:&lt;/strong&gt; '.$_POST['sexo'];
$responseString.= '&lt;br/&gt;';
$responseString.= '&lt;strong&gt;Pa&amp;iacute;s:&lt;/strong&gt; '.$_POST['pais'];
echo $responseString;
?&gt;
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