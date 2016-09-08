<?php
	//require_once('functions.php')
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Creating the select/unselect all checkboxes functionality Lesson</title>
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
$('#handle').click(function(){
if($(this).attr('checked') == true)
$('.toggle').attr('checked', 'true');
else
$('.toggle').removeAttr('checked');
});
$('.toggle').click(function(){
if($('.toggle:checked').length == $('.toggle').length)
$('#handle').attr('checked', 'true');
if($('.toggle:checked').length < $('.toggle').length)
$('#handle').removeAttr('checked');
});
$('#getValue').click(function(){
var values = '';
if($('.toggle:checked').length)
{
$('.toggle:checked').each(function(){
values+= $(this).next('label').html() + ' ,';
});
$('#selected').html('Selected values are: ' + values);
}
else
$('#selected').html('Nothing selected');
});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<h4 class="">Vida Inform&aacute;tica.com</h4>
			<h1 class="page-header">Creating the select/unselect all checkboxes functionality Lesson</h1>
			<small>Lenguajes: html5, CSS3, PHP, jQuery</small>
			<h2>Preparaci&oacute;n</h2>
			<p>Crea el siguiente archivo</p>
			<ol>
				<li>index.php</li>
			</ol>
			<h2>C&oacute;mo hacerlo</h2>
			<ol>
				<li>Abre <em>index.php</em> y teclea el siguiente codigo:</li>
				<code>
					<pre>
&lt;ul&gt;
&lt;li&gt;
&lt;input type=&quot;checkbox&quot; id=&quot;handle&quot;&gt;
&lt;label for=&quot;handle&quot;&gt;
&lt;strong&gt;Toggle All&lt;/strong&gt;&lt;/label&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;input type=&quot;checkbox&quot; class=&quot;toggle&quot;/&gt;
&lt;label&gt;A Study in Scarlet&lt;/label&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;input type=&quot;checkbox&quot; class=&quot;toggle&quot;/&gt;
&lt;label&gt;The Sign of the Four&lt;/label&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;input type=&quot;checkbox&quot; class=&quot;toggle&quot;/&gt;
&lt;label&gt;The Adventures of Sherlock Holmes&lt;/label&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;input type=&quot;checkbox&quot; class=&quot;toggle&quot;/&gt;
&lt;label&gt;The Valley of Fear&lt;/label&gt;
&lt;/li&gt;
&lt;li&gt;
&lt;input type=&quot;checkbox&quot; class=&quot;toggle&quot;/&gt;
&lt;label&gt;His Last Bow&lt;/label&gt;
&lt;/li&gt;
&lt;li&gt;&lt;input type=&quot;button&quot; id=&quot;getValue&quot;
value=&quot;Get Selected Values&quot;/&gt;&lt;/li&gt;
&lt;li id=&quot;selected&quot;&gt;&lt;/li&gt;
&lt;/ul&gt;
					</pre>
				</code>
<ul>
<li>
<input type="checkbox" id="handle">
<label for="handle">
<strong>Toggle All</strong></label>
</li>
<li>
<input type="checkbox" class="toggle"/>
<label>A Study in Scarlet</label>
</li>
<li>
<input type="checkbox" class="toggle"/>
<label>The Sign of the Four</label>
</li>
<li>
<input type="checkbox" class="toggle"/>
<label>The Adventures of Sherlock Holmes</label>
</li>
<li>
<input type="checkbox" class="toggle"/>
<label>The Valley of Fear</label>
</li>
<li>
<input type="checkbox" class="toggle"/>
<label>His Last Bow</label>
</li>
<li><input type="button" id="getValue"
value="Get Selected Values"/></li>
<li id="selected"></li>
</ul>


				<li>Ahora, incluye jQuery y escribe el siguiente codigo para el evento <em>click</em> del boton.</li>
				<code>
					<pre>
$('#handle').click(function(){
if($(this).attr('checked') == true)
$('.toggle').attr('checked', 'true');
else
$('.toggle').removeAttr('checked');
});
$('.toggle').click(function(){
if($('.toggle:checked').length == $('.toggle').length)
$('#handle').attr('checked', 'true');
if($('.toggle:checked').length < $('.toggle').length)
$('#handle').removeAttr('checked');
});
$('#getValue').click(function(){
var values = '';
if($('.toggle:checked').length)
{
$('.toggle:checked').each(function(){
values+= $(this).next('label').html() + ' ,';
});
$('#selected').html('Selected values are: ' + values);
}
else
$('#selected').html('Nothing selected');
});
					</pre>
				</code>
				
				<li>Now, refresh your browser and start playing with the checkboxes. Clicking on the Toggle All checkbox will select and deselect all the checkboxes alternatively. Click on the Get Selected Values button and a comma-separated list will appear below the button displaying names of all selected books.</p>
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