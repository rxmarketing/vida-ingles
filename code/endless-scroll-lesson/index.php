<?php require_once('functions.php')?>
<html>
	<head>
		<title>Endless Scroll Lesson PHP MySQL jQuery</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://localhost/vidaingles/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/jquery-ui.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/vi_print.css" media="print"/>
		
		<script src="http://localhost/vidaingles/js/jquery-1.11.3.min.js"></script>
		<script src="http://localhost/vidaingles/js/bootstrap.min.js"></script>
		<script src="http://localhost/vidaingles/js/jquery-ui.min.js"></script>
		<script src="http://localhost/vidaingles/js/timeago.js"></script>
		<script>
			// This is an incomplete lesson. doesn't alert when page reaches bottom, but it alerts when it reaches top. The exact opposite.
			$(function(){
				$(window).scroll(function(){
					if($(window).scrollTop() == $(document).height() - $(window).height()) {
						var ol = $('#verbos');
						var start = ol.children().lenght;
						alert(ol);
						if(!ol.hasClass('ended')) {
							$.get('ajax.php', {'start': start}, function(res){
								if(res !=='end') {
									ol.append(res);
									} else {
									if(!ol.hasClass('ended')) {
										alert('No more verbs to show');
										ol.addClass('ended');
									}
								}
							}); //Ends .get 
						}
					}
				}); //Ends window.scroll function
			});
			
		</script>
	</head>
	<body>
		<div class="container">
			<h1 class="page-header">Endless Scroll Lesson PHP MySQL jQuery</h1>
			<h2>Verbos Irregulares</h2>
			<?php $verbs = getVerbos(0,40); ?>
			<ol id="verbos">
				<?php foreach($verbs as $v): ?>
				<li><?php echo $v['baseForm']; ?></li>
				<?php endforeach ?>
			</ol>
		</div>
		
		
		
		
		
		
	</body>
</html>