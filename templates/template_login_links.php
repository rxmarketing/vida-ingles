<?php
	//include_once("template_search.php");
	//vinculos iniciar o terminar sesion
	$loginlink = '<div class="collapse navbar-collapse">
	
	<form id="form-login" method="post" class="navbar-form navbar-right hidden-sm" role="form">
	<div class="form-group">
	<input type="text" name="email" id="email" placeholder="Correo electrónico" class="form-control">
	</div>
	<div class="form-group">
	<input type="password" name="password" id="password" maxlenght="100" placeholder="Contraseña" class="form-control">
	</div>
	<div class="btn-group">
	<button id="btn-signin" type="button" data-loading-text="Loading..." autocomplete="off" class="btn btn-primary">Ingresar</button>
	<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle dropdown</span></button>
	<ul class="dropdown-menu" role="menu">
	<li><a href="http://localhost/vidaingles/forgotpass.php">Olvidé contraseña</a></li>
	<li class="divider"></li>
	<li><a href="http://localhost/vidaingles/contacto">Contacto</a></li> 
	<li><a href="http://localhost/vidaingles/contacto">Reportar un problema</a></li>
	</ul>
	</div>
	<div id="status"></div>
	</form>
	</div>';
	
	if($user_ok == true) {
		$loginlink = '<ul class="nav navbar-nav navbar-right">
		<li><a href="http://localhost/vidaingles/usuario/'.$log_username.'">'.$log_username.'</a></li>
		<li class="navbar-text"> '.$log_user_pic.'</li>
		<li><a href="http://localhost/vidaingles/logout.php">Salir</a></li>
		<li class="navbar-text"><span type="button" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle dropdown</span></span>
		<ul class="dropdown-menu" role="menu">
		<li><a href="http://localhost/vidaingles/contacto">Envianos un mensaje</a></li>
		<li><a href="http://localhost/vidaingles/contacto">Reportar un problema</a></li>
		<li class="divider"></li>
		<li><a href="http://localhost/vidaingles/changepass.php">Cambiar contraseña</a></li>
		</ul>
		</li>
		</ul>';
	}
?>
<?php echo $loginlink; ?>