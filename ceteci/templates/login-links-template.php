<?php
/**
 * Created by PhpStorm.
 * User: Ricardo M
 * Date: 16/04/2017
 * Time: 03:11 PM
 */

$loginlinks = $admin_ok == true ? "<ul class=\"navbar-nav my-2 my-md-0\">
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">" . $log_adminusername . "</a></li>
			<li class=\"nav-item\">
				<div class=\"dropdown\">
					<a class=\"dropdown-toggle nav-link\" type=\"\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
						<span class=\"fa fa-ellipsis-v fa-lg\"></span>
					</a>
					<div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuButton\">
						<a class=\"dropdown-item\" href=\"#\">Cerrar sesión</a>
						<a class=\"dropdown-item\" href=\"#\">Cambiar contraseña</a>
						<a class=\"dropdown-item\" href=\"#\">Reportar un problema</a>
					</div>
				</div>
			</li>
		</ul>" : "<ul class=\"navbar-nav my-2 my-md-0\">
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Crear cuentaaaaaaaa</a></li>
			<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">Iniciar sesión</a></li>
			<li class=\"nav-item\">
				<div class=\"dropdown\">
					<a class=\"dropdown-toggle nav-link\" type=\"\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
						<span class=\"fa fa-ellipsis-v fa-lg\"></span>
					</a>
					<div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"dropdownMenuButton\">
						<a class=\"dropdown-item\" href=\"#\">Action</a>
						<a class=\"dropdown-item\" href=\"#\">Another action</a>
						<a class=\"dropdown-item\" href=\"#\">Something else here</a>
					</div>
				</div>
			</li>
		</ul>";

echo $loginlinks;