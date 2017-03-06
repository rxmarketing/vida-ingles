<?php
	$db_conx = new mysqli("localhost","ricomx","tiotony","cetec");
	$db_conx->set_charset("utf8");
	if($db_conx->connect_errno) {
		echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
		//echo "ERRNO: " . $db_conx->connect_errno . "<br />";
		//echo "ERROR: " . $db_conx->connect_error;
		exit;
	}
	$group_list = "";
	$module_name = "";
	$consulta = "SELECT
	
	grp_id AS 'Id'
	,escuela_id
	,maes_id
	,grp_clave
	,grupo_fecha_inicio
	,grupo_fecha_final
	,grupo_timein AS 'timein'
	,grupo_timeout AS 'timeout'
	,grupo_dias AS 'dias'
	,grupo_cat_nombre AS 'categoria'
	,modulos.mod_nombre_id AS 'mod name id'
	,modulos.mod_fecha_inicio AS 'mod inicio'
	,module_levels.mod_level_name AS 'nivel'		
	
	FROM grupos  
	
	INNER JOIN grupo_categorias ON grupo_categorias.grupo_cat_id = grupos.grupo_cat_id
	INNER JOIN modulos ON modulos.mod_id = grupos.modulo_id
	INNER JOIN module_levels ON module_levels.mod_level_id = modulos.mod_descripcion_id
	
	WHERE grupo_estatus_id=5
	
	ORDER BY grupo_estatus_id DESC";
	
	if(!$sql = $db_conx->prepare($consulta)) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
		exit;
	}
	$sql->execute();
	if(!$resultado = $sql->get_result()) {
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo obteniendo los resultados. (" . $db_conx->errno . ") " . $db_conx->error;
	}
	$group_count = $resultado->num_rows;
	
	// Start the loop
	while ($row = $resultado->fetch_assoc()) {
		$groupid = $row['Id'];
		$escuelaid = $row['escuela_id'];
		$grpCategoria = $row['categoria'];
		$moduloNivel = $row['nivel'];
		$modFechaInicio = $row['mod inicio'];
		$grupoclave = $row['grp_clave'];
		// $grupoestatusid = $row['grupo_estatus_id'];
		$moduloNameId = $row['mod name id'];
		$grupotimein = date_create($row['timein']);
		$grupotimeout = date_create($row['timeout']);
		$grupodias = $row['dias'];
		$grupohorario = date_format($grupotimein,'g') . '-'. date_format($grupotimeout,'g a') . ' / ' . $grupodias;
		$fechainicio = $row['grupo_fecha_inicio'];
		//$fechacreada = $row['grp_fecha_creada'];
		//$grp_fechacreada = strftime('%d %b, %Y', strtotime($fechacreada));
		//$fechamodificada = $row['grp_fecha_modificacion'];
		//$grp_fechamodificada = strftime('%d %b, %Y', strtotime($fechamodificada));
		//$gruponotas = $row['grupo_notas'];
		//$currWeek = mysqli_query($db_cetec_conx, "SELECT ");
		
		$count = $db_conx->query("SELECT estud_id FROM estudiantes WHERE grupo_id='$groupid' AND estud_status_id= 1");
		$studCount = $count->num_rows;
		
		$group_list .= '<tr class="'.returnModule($module_name).'">
		<td class="text-center">'.$groupid.'</td>
		<td>'.$fechainicio.'</td>
		<td>'.$grpCategoria.'</td>
		<td class="text-center">'.$moduloNivel.'</td>
		<td class="text-center">'.$modFechaInicio.'</td>
		<td>'.$grupoclave.'</td>
		<td>'.$grupohorario.'</td>
		<td class="text-center">'.$studCount.'</td>
		<td><a href="group_details.php?id='.$groupid.'">Details</a></td>
		</tr>';
	}
	function returnModule($mod){
		$module = "";
		switch($mod){
			case "FR Elementary A":
			$module="elem-bground";
			break;
			case "FR Elementary B":
			$module="elem-bground";
			break;
			case "FR Pre-Intermediate A":
			$module="preint-bground";
			break;
			case "FR Pre-Intermediate B":
			$module="preint-bground";
			break;
			case "FR Intermediate A":
			$module="int-bground";
			break;
			case "FR Intermediate B":
			$module="int-bground";
			break;
			case "Grammar Gym 1":
			$module="gg-bground";
			break;
		}	
		return $module;
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Groups</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/cetec.css" />
		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/myjavascript.js"></script>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
				
				<a class="navbar-brand" href="#">Dashboard</a>
				
			</nav>
		</header>
		<section class="container">
			<div class="row">
				<div class="col-md-9">
					<h1>Grupos <small><?php echo $group_count; ?> activos</small></h1>
					<table class="table table-responsive table-striped">
						<thead>
							<th>Id</th>
							<th>Grupo inició</th>
							<th>Categoria</th>
							<th>Nivel actual</th>
							<th>Nivel inició</th>
							<th>Clave grupo</th>
							<th>Horario / Días</th>
							<th># estudiantes</th>
							<th>Actions</th>
						</thead>
						<tbody>
							<?php echo $group_list ?>
						</tbody>
						<tfoot>
						</tfoot>
					</table>
				</div>
			</div>
		</section>
	</body>
</html>