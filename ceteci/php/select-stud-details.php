<?php
	if(isset($_POST['student_id'])) {
		
		$db_conx = new mysqli("localhost","ricardo","tiotony","ceteci");
		$db_conx->set_charset("utf8");
		if($db_conx->connect_errno) {
			echo "Lo sentimos, este sitio esta teniendo problemas, intentelo mas tarde. <br />";
			//echo "ERRNO: " . $db_conx->connect_errno . "<br />";
			//echo "ERROR: " . $db_conx->connect_error;
			exit;
		
		$yrs = null;
		$dob = null;
		$mob = null;
		for ($yr = date("Y"); $yr >= 1940; $yr--) {
			$yrs .= '<option value="' . $yr . '"> ' . $yr . ' </option >';
		}
		// populate the select options with dates
		for ($date = 1; $date <= 31; $date++) {
			$dob .= '<option value="' . $date . '"> ' . $date . ' </option >';
		}
		// Populate the select options with month numbers
		for($mes = 1; $mes <=12; $mes++) {
			$mob .= '<option value="'.$mes.'">'.$mes.'</option>';
		}
		
		$lista_estudiantes = null;
		$consulta = "SELECT 
		estudiantes.estud_id
		,schools.scl_clave AS 'Escuela'
		,estudiantes.grupo_id
		,estudiantes.estud_matricula
		,estudiantes.estud_status_id
		,estudiantes.estud_pnombre
		,estudiantes.estud_snombre
		,estudiantes.estud_papellido
		,estudiantes.estud_sapellido
		,generos.genero_clave AS 'Genero'
		,grupos.grp_clave AS 'Grupo'
		,tbl_estud_estatuses.estud_estatus_nombre AS 'Estatus'
		,modulos.mod_descripcion_id AS 'Level Id'
		,module_levels.mod_level_name AS 'Nombre Nivel'
		
		FROM estudiantes 
		
		INNER JOIN schools ON schools.scl_id = estudiantes.escuela_id
		INNER JOIN generos ON generos.genero_id = estudiantes.genero_id
		INNER JOIN grupos ON grupos.grp_id = estudiantes.grupo_id
		INNER JOIN tbl_estud_estatuses ON tbl_estud_estatuses.estud_estatus_id = estudiantes.estud_status_id
		INNER JOIN modulos ON modulos.mod_id = grupos.modulo_id
		INNER JOIN module_levels ON module_levels.mod_level_id = modulos.mod_descripcion_id
		
		ORDER BY  grupo_id DESC";
		
		if (!$sql = $db_conx->prepare($consulta)) {
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit;  
		}
		$sql->execute();
		if(!$resultado = $sql->get_result()) {
			echo "Fallo la fetch_result (" . $db_conx->errno . ") " . $db_conx->error;
			exit;
		}
		while($fila = $resultado->fetch_assoc()) {
			$studid = $fila['estud_id'];
			$matricula = $fila['estud_matricula'];
			$schoolclave = $fila['Escuela'];
			$grupoclave = $fila['Grupo'];
			$levelId = $fila['Level Id'];
			$levelNombre = $fila['Nombre Nivel'];
			$studestatusnombre = $fila['Estatus'];
			$pnombre = $fila['estud_pnombre'];
			$snombre = $fila['estud_snombre'];
			$papellido = $fila['estud_papellido'];
			$sapellido = $fila['estud_sapellido'];
			$studfullname = $pnombre . ' ' . $snombre . ' ' . $papellido . ' ' . $sapellido;
			$generoclave = $fila['Genero'];
			$lista_estudiantes .= '<tr>
			<td>'.$studid.'</td>
			<td>'.$matricula.'</td>
			<td>'.$studfullname.'</td>
			<td>'.$generoclave.'</td>
			<td>'.$schoolclave.'</td>
			<td>'.$grupoclave.'</td>
			<td>'.$levelNombre.'</td>
			<td>'.$studestatusnombre.'</td>
			<td><input type="button" name="view" value="View" id="' . $studid . '" class="btn btn-info btn-xs view-data" /></td>
			<td><input type="button" name="view" value="Edit" id="' . $studid . '" class="btn btn-info btn-xs edit-data" /></td>
			</tr>';
		}
	}
?>