<?php
	include_once("inc/checar_sesion.php");
	include_once("inc/functions.php");
	$less_list = "";
	$sql = "SELECT * FROM lecciones ORDER BY datepublished DESC";
	$qry = mysqli_query($db_conx,$sql);
	while ($row = mysqli_fetch_array($qry, MYSQLI_ASSOC)){
		$less_id = $row['lessonid'];
		$less_course = $row['lesson_courseid'];
		$less_cef = $row['lessoncef'];
		$less_title = $row['lessontitle'];
		$less_title_notags = strip_tags($less_title);
		$less_friendly = $row["lesson_name"];
		$less_content = $row['lessoncontent'];
		$less_date_pub = $row['datepublished'];
		$less_date_mod = $row['datemodified'];
		$less_excerpt = strip_tags(substr($less_content, 0,200));
		$less_list .= '<li class="media">
		<div class="media‐left">
		<a href="'.$domain.'/lecciones/'.$less_id.'/'.$less_friendly.'">
		<img class="media‐object" src="i/vidaingles-logo30x30.png" alt="' .$less_title . '" title="' .$less_title_notags . '">
		</a>
		</div>
		<div class="media‐body">
		<h3 class="media‐heading"><a href="'.$domain.'/lecciones/'.$less_id.'/'.$less_friendly.'" title="' .$less_title_notags . '">' .$less_title . '</a></h3>
		<div class="cef">Actualizado: <abbr class="timeago" title="'.$less_date_mod .'">'. $less_date_mod .'</abbr></div>
		'.$less_excerpt.' ... '.'<a href="'.$domain.'/lecciones/'.$less_id.'/'.$less_friendly.'">[ lee más..]</a>
		</div>
		</li>';
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<title>Lista de todas las lecciones de Ingles</title>
		<?php include("css/css_includes.php") ?>
		<?php include("js/javascript_includes.php") ?>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script>
			$(function (){
				//var last_lesson = $("div#maincontent-right").attr('style');
				//$('.meta').text(last_lesson);
				$('.load-more').on('click',function(){
					var last_lesson_id = $(this).attr('id');
					if(last_lesson_id!=='end'){
						$.ajax({
							type: 'POST',
							url:	'ajax/ajax_load_more_lessons.php',
							data:	'lastlessonid='+last_lesson_id,
							beforeSend: function(){
								//$('a.load-more').append('<img src="vi_i/vi_loader.gif"/>');
							}
						}) // Ends .ajax()
						.always(function (lessns) {
							$('.show-more-wrapper').remove();
							$('ul#lessons').append(lessns);
						});
					}
					return false;
				}); //Ends .live() click
			});
		</script>
	</head>
	<body>
		<?php include_once('templates/template_header.php') ?>
		<!-- Ends header ========
		=======================================-->
		<?php echo $showcase ?>
		<div class="container" id="vi_content">
			<div class="row">
				<div class="col-md-8">
					<h1 class="mute">Lecciones de Ingles</h1>
					<h3></h3>
					<div class="metadata">
						<span class=""></span>
					</div>
					<ul class="media-list" id="lessons">
						<?php echo $less_list ?>
					</ul>
					<!--<div class="show-more-wrapper well" id="show-more-wrapper">
						<a href="#" id="<?php echo $less_id ?>" class="load-more">Mostrar más lecciones <span class="caret"></span></a>
					</div> -->
				</div><!-- Ends col-md-8 -->
				<!-- SIDE BAR
				======================================================-->
				<div class="col-md-4">
					<?php include_once('templates/template_sidebar_right.php')?>
				</div><!--Ends col-md-4 -->
			</div>
		</div>
		<!--- FOOTER
		======================================================-->
		<footer class="footer">
			<div class="container">
				<?php include_once('templates/template_footer.php') ?>
			</div>
		</footer>
	</body>
</html>	