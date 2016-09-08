<?php 
//require_once('functions.php')
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Detecting an Ajax Request in PHP Lesson</title>
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
        </style>
		<script>
			// This is an incomplete lesson. doesn't alert when page reaches bottom, but it alerts when it reaches top. The exact opposite.
			$(function(){
			
    $('input:button').click(function() {
        $.get('check.php',function(data) {
            $('input:button').after(data);
            });
     });

   
			});
			
		</script>
	</head>
	<body>
		<div class="container">
        <h3 class="">Vida Informatica</h3>
			<h1 class="page-header">Detecting an Ajax Request in PHP Lesson</h1>
			<h2>Preparacion</h2>
	<p>Crea dos archivos</p>
	<ol>
		<li>index.php</li>
		<li>check.php</li>
	</ol>
    <h2>Como hacerlo</h2>
    <ol>
    	<li>Abre <em>index.php</em> y teclea el siguiente codigo:</li>
 
<code>
<pre>
&lt;form&gt;
  &lt;input type="button" value="Cargar datos"/&gt;
&lt;/form&gt;
</pre>
</code>

<form>
  <input type="button" value="Cargar datos"/>
</form>
<li>Ahora, incluye jQuery y escribe el siguiente codigo para el evento <em>click</em> del boton.</li>
<code>
	<pre>
    $('input:button').click(function() {
        $.get('check.php',function(data) {
            $('input:button').after(data);
        });
    });
 </pre>
</code>
<li>Abre <em>check.php</em> y escribe el siguiente codigo:</li>
<code>
	<pre>&lt;?php
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        echo 'YaY!!! Peticion exitosa';
    } else {
        echo 'Esta no es una peticion AJAX. Esta pagina no se puede acceder directamente.';
    }
?&gt;</pre>
</code>
<li>Abre <em>index.php</em> en tu navegador y clic el boton <em>Cargar datos</em>. Tu podras ver el texto <b>Yay!!! Peticion exitosa</b> insertado despues del boton. Ahora, en otra pestaña del navegador, escribe la ruta directa hacia <em>check.php</em>. Podrás ver el siguiente mensaje: <b>Esta no es una peticion AJAX. Esta pagina no se puede acceder directamente.</b> </li>
    </ol>
<div class="container">
        <div class="row">
        <div class="col-lg-12">
		 <footer>
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <p>&copy; <?php echo date('Y') ?> Vida Inglés &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</footer>
        </div>
</div>
        </div>
		</div>
		
		
		
		
		
	</body>
</html>