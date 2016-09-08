<?php
	
	
?>
<html>
	<head>
		<title>Floating Div with jQuery</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://localhost/vidaingles/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/jquery-ui.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/vi_print.css" media="print"/>
		
		<script src="http://localhost/vidaingles/js/jquery-1.11.3.min.js"></script>
		<script src="http://localhost/vidaingles/js/bootstrap.min.js"></script>
		<script src="http://localhost/vidaingles/js/jquery-ui.min.js"></script>
		<script src="http://localhost/vidaingles/js/timeago.js"></script>
		
		<style>
			body{ font-family:"trebuchet MS",Arial;
			font-size:14px;width:500px;}
			p
			{
			border:1px solid black;
			height:200px;
			width:300px;
			}
			.float
			{
			border:1px solid black;
			position:absolute;
			right:50px;
			height:100px;
			width:100px;
			padding:10px;
			}
		</style>
	</style>		
	<script>
		$(function(){
			var defaultOffset = 100;
			function floatDiv() {
				var offsetTop = $(document).scrollTop() + defaultOffset;
				$('#float').animate(
				{top: offsetTop + "px"},
				{duration:300,queue:false}
				);
			}
			$(window).scroll(floatDiv);
			floatDiv();
			
			
		});
	</script>
</head>
<body>
	<div class="container">
		<h1 class="page-header">Floating Div Lesson with jQuery</h1>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<p>
			This is some text
		</p>
		<div id="float" class="float">Floating box</div>
	</div>
	
	
	
	
	
	
</body>
</html>