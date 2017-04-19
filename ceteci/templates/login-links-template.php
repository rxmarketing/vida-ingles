<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 03:11 PM
 */
$admin_ok = "";
$student_ok = "";
$loginlinks = null;
if ($admin_ok == true) {
    $loginlinks = "<ul class=\"navbar-nav mr-auto\">
			<li class=\"nav-item active\">
				<a class=\"nav-link\" href=\"\"><span class=\"fa fa-home fa-lg\"></span> <span class=\"sr-only\">(current)</span></a>
			</li>
			<li class=\"nav-item\">
				<a class=\"nav-link\" href=\"groups.php\"><span class=\"fa fa-book fa-lg\"></span> Grupos</a>
			</li>
			<li class=\"nav-item\">
				<a class=\"nav-link\" href=\"students.php\">Estudiantes</a>
			</li>
			<li class=\"nav-item\">
				<a class=\"nav-link\" href=\"modules.php\">Módulos</a>
			</li>
			<li class=\"nav-item dropdown\">
				<a class=\"nav-link dropdown-toggle\" href=\"http:\" id=\"dropdown01\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">more...</a>
				<div class=\"dropdown-menu\" aria-labelledby=\"dropdown01\">
					<a class=\"dropdown-item\" href=\"#\">Exámenes</a>
					<a class=\"dropdown-item\" href=\"#\">Asistencia</a>
					<a class=\"dropdown-item\" href=\"#\">Something else here</a>
				</div>
			</li>
		</ul>
<ul class=\"navbar-nav my-2 my-md-0\">
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">" . $log_username . "</a></li>
			<li class=\"nav-item\">
				<div class=\"dropdown\">
					<a class=\"dropdown-toggle nav-link\" type=\"\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
						<span class=\"fa fa-ellipsis-v fa-lg\"></span>
					</a>
					<div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuButton\">
						<a class=\"dropdown-item\" href=\"logout.php\">Cerrar sesión</a>
						<a class=\"dropdown-item\" href=\"#\">Cambiar contraseña</a>
						<a class=\"dropdown-item\" href=\"#\">Reportar un problema</a>
					</div>
				</div>
			</li>
		</ul>";
}

if ($student_ok == true) {
    $loginlinks = '<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href=""><span class="fa fa-home fa-lg"></span> <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="examenes.php"><span class="fa fa-book fa-lg"></span> Examenes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="asistencias.php">Asistencia</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http:" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more...</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
					<a class="dropdown-item" href="#">Link</a>
					<a class="dropdown-item" href="#">Link</a>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
		</ul>
<ul class="navbar-nav my-2 my-md-0">
		<li class="nav-item"><a class="nav-link" href="user.php?u=' . $log_username . '">' . $log_username . '</a></li>
			<li class="nav-item">
				<div class="dropdown">
					<a class="dropdown-toggle nav-link" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="fa fa-ellipsis-v fa-lg"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="logout.php">Cerrar sesión</a>
						<a class="dropdown-item" href="changepass.php">Cambiar contraseña</a>
						<a class="dropdown-item" href="#">Reportar un problema</a>
					</div>
				</div>
			</li>
		</ul>';
}

if ($admin_ok == false && $student_ok == false) {
    $loginlinks = "<ul class=\"navbar-nav mr-auto\"></ul>
<ul class=\"navbar-nav my-2 my-md-0\">
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Activar cuenta</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"cetec_login.php\">Iniciar sesión</a></li>
		<li class=\"nav-item\">
				<div class=\"dropdown\">
					<a class=\"dropdown-toggle nav-link\" type=\"\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
					<span class=\"fa fa-ellipsis-v fa-lg\"></span>
					</a>
					<div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuButton\">
					<a class=\"dropdown-item\" href=\"#\">Olvidé contraseña</a>
					</div>
				</div>
			</li>
		</ul>";
}

echo $loginlinks;