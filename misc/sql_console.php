<?php require_once("loadmore_class.php") ?>
<!doctype html>
<html lang="es">
	<head>
		<title>SQL CONSOLE</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://localhost/vidaingles/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/jquery-ui.min.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/vi_core.css"/>
		<link rel="stylesheet" href="http://localhost/vidaingles/css/vi_print.css" media="print"/>
		
		<script src="http://localhost/vidaingles/js/jquery-1.11.3.min.js"></script>
		<script src="http://localhost/vidaingles/js/bootstrap.min.js"></script>
		<script src="http://localhost/vidaingles/js/jquery-ui.min.js"></script>
		<script src="http://localhost/vidaingles/js/login.js"></script>
		<script src="http://localhost/vidaingles/js/timeago.js"></script>
		<script src="http://localhost/vidaingles/js/vidaingles.js"></script>
		<script>
			$(function(){
				$('.loadmore').click(function(){
					var val = $('.final').attr('val');
					$.post('loadmore_class.php',{'from':val},function(data){
						//alert(data);
						$('.final').remove();
						$(data).insertBefore('.loadmore');
					});
				});
			});
			
		</script>
	</head>
	<body>
		<div class="container">
			<div class="well">
				<h1>jQuery Load More</h1>
			</div>
			<div>
				<?php echo $titleList ?>
			</div>
			<div class="entry"></div>
			<button class="btn btn-primary loadmore">Load more</button>
		</div>
	</body>
</html>