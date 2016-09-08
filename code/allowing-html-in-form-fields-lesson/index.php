<?php
	//require_once('functions.php')
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Allowing HTML inside text areas and limiting HTML tags that can be used Lesson</title>
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
			/width: 400px;
			border: 1px solid #eee;
			padding: 10px;
			}
		</style>
		<script>
			$(function(){
$('#check').click(function()
{
$.post(
"validate.php",
{ comment: $('#comment').val() },
function(data)
{
$('#stripped').val(data);
});
});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<h4 class="">Vida Inform&aacute;tica.com</h4>
			<h1 class="page-header">Allowing HTML inside text areas and limiting HTML tags that can be used Lesson</h1>
			<small>Lenguajes: html5, CSS3, PHP, jQuery</small>
			<h2>Preparaci&oacute;n</h2>
			<p>Crea dos archivos</p>
			<ol>
				<li>index.php</li>
				<li>validate.php</li>
			</ol>
			<h2>C&oacute;mo hacerlo</h2>
			<ol>
				<li>Abre <em>index.php</em> y teclea el siguiente codigo:</li>
				<code>
					<pre>
&lt;form&gt;
&lt;table&gt;
&lt;tr&gt;
&lt;td valign=&quot;top&quot;&gt;Write some HTML in the box&lt;br/&gt;
(Only allowed HTML tags are&lt;br/&gt;&amp;lt;b&amp;gt;,&amp;lt;u&amp;gt;,&amp;lt;
i&amp;gt; and &amp;lt;strong&amp;gt;.&lt;br/&gt;Other tags will
be removed):&lt;/td&gt;&lt;td&gt;
&lt;textarea id=&quot;comment&quot; cols=&quot;50&quot; rows=&quot;10&quot;&gt;&lt;/textarea&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
&lt;td valign=&quot;top&quot;&gt;This is how your HTML will look:&lt;/td&gt;
&lt;td&gt;
&lt;textarea id=&quot;stripped&quot; cols=&quot;50&quot; rows=&quot;10&quot;&gt;
&lt;/textarea&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/table&gt;
&lt;input type=&quot;button&quot; value=&quot;Check&quot; id=&quot;check&quot; /&gt;
&lt;/form&gt;
					</pre>
				</code>
<form>
<table>
<tr>
<td valign="top">Write some HTML in the box<br/>
(Only allowed HTML tags are<br/>&lt;b&gt;,&lt;u&gt;,&lt;
i&gt; and &lt;strong&gt;.<br/>Other tags will
be removed):</td><td>
<textarea id="comment" cols="50" rows="10"></textarea>
</td>
</tr>
<tr>
<td valign="top">This is how your HTML will look:</td>
<td>
<textarea id="stripped" cols="50" rows="10">
</textarea>
</td>
</tr>
</table>
<input type="button" value="Check" id="check" />
</form>


				<li>Ahora, incluye jQuery y escribe el siguiente codigo para el evento <em>click</em> del boton.</li>
				<code>
					<pre>
$('#check').click(function()
{
$.post(
"validate.php",
{ comment: $('#comment').val() },
function(data)
{
$('#stripped').val(data);
});
});
					</pre>
				</code>
				<li>Abre <em>validate.php</em> y escribe el siguiente codigo:</li>
				<code>
					<pre>
&lt;?php
$text = $_POST['comment'];
echo trim(strip_tags($text, '&lt;b&gt;&lt;u&gt;&lt;i&gt;&lt;strong&gt;'));
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