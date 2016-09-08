<div id="msg"></div>
<header id="header-wrap" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<img class="logo" src="<?php echo home() ?>/i/vidaingles-logo50x50.png" width="25" height="25" alt="Vida Inglés"/> 
			<a class="navbar-brand" href="<?php echo home() ?>">Vida Inglés</a>
		</div><!-- Ends navbar-header -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo home() ?>">Inicio</a></li>
				<li><a href="<?php echo home()?>/verbos">Verbos</a></li>
				<li><a href="<?php echo home() ?>/paginas/4/formulas-de-ingles">Sintaxis</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo home()?>/lecciones">Lecciones</a></li>
						<li><a href="<?php echo home()?>/ejercicios">Ejercicios</a></li>
						<li><a href="#">Canciones</a></li>
						<li><a href="#">Cursos</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="<?php echo home() ?>/contacto">Contact</a></li>
						<li><a href="#about">About</a></li>
					</ul>
				</li>
			</ul>
			<?php include_once('templates/template_login_links.php') ?>
		</div>
	</div><!--Ends container -->
</header>