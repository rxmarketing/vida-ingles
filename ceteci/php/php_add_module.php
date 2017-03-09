<?php
	include('../inc/db_ceteci_conn.php');
	$group_id = null;
	if (!empty($_POST)) {
		$mod_cat_id = $_POST['mod_cat_id'];
		$mod_subcat_id = $_POST['modNameId'];
		$mod_days = implode(", ", $_POST['days']);
		$mod_start_date = $_POST['modStartDate'];
		$mod_end_date = $_POST['modEndDate'];
		$mod_timein = $_POST['timein'];
		$mod_timeout = $_POST['timeout'];
		$group_id = $_POST['groupID'];
		$mod_weeks = $_POST['modWeeks'];
		$mod_status = $_POST['modStatus'];
		$mod_notes = $_POST['modNotes'];
		// CHECK IF THE GROUP SELECTED HAS AN ACTIVE MODULE ASSIGNED
		$stmt = "SELECT grupo_actual_modulo_id FROM grupos WHERE grupo_id = '$group_id' AND grupo_estatus_id = '5' LIMIT 1";
		if(!$sql = $db_conx->query($stmt)) {
			$addMod_msg = "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			$addMod_msg .= "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			$addModJson = array("mensaje" => $addMod_msg);
			echo json_encode($addModJson);
			exit;
		}
		while($row = $sql->fetch_assoc()){
			$grpModId = $row['grupo_actual_modulo_id'];
		}
		//$group_check = $sql->num_rows;
		//echo $group_id . '<br />';
		//echo $grpModId;
		
		// FETCH cef_id AND modulo_nivel_id OF THE modulo_subcat_id ABOVE FROM modulo_subcategorias TABLE
			$stmt = "SELECT cef_id, modulo_nivel_id FROM modulo_subcategorias WHERE modulo_subcat_id = '$mod_subcat_id' LIMIT 1";
			if(!$sql = $db_conx->query($stmt)) {
				echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
				echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
				exit;
			} 
			while($row = $sql->fetch_assoc()){
				$modCefId = $row['cef_id'];
				$modLevelId = $row['modulo_nivel_id'];
				//echo 'MODULE CEF ID: '.$modCefId. ' MODULE LEVEL ID: '.$modLevelId;
			}
		
		if ($mod_cat_id == "" || $mod_subcat_id == "" || $mod_days == "" || $mod_start_date == "" || $mod_end_date == "" || $group_id == "" || $mod_weeks == "" || $mod_notes == "" || $mod_status == "" || $mod_timein == "" || $mod_timeout == "") {
			$addMod_msg = 'PHP: Todos los campos son obligatorios.';
			$addModJson = array("mensaje" => $addMod_msg);
			echo json_encode($addModJson);
			exit;
			} else if(!$grpModId == 0){
			echo 'PHP: Este grupo ya tiene modulo asignado. Elige otro o crea uno nuevo.';
			
			exit;
			} else {
			$stmt = $db_conx->prepare("INSERT INTO modulos (
			mod_cat_id
			,mod_subcat_id
			,mod_grupo_id
			,mod_fecha_inicio
			,mod_fecha_final
			,mod_hora_inicio
			,mod_hora_final
			,mod_dias
			,mod_numero_semanas
			,mod_estatus_id
			,mod_notas
			,mod_fecha_creada
			,mod_fecha_modificada
			) 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())");
			if(!$stmt){
				$addMod_msg = "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
				$addMod_msg .= "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
				$addModJson = array("mensaje" => $addMod_msg);
				echo json_encode($addModJson);
				exit;
			}
			$stmt->bind_param('dddssssssds'
			,$mod_cat_id
			,$mod_subcat_id
			,$group_id
			,$mod_start_date
			,$mod_end_date
			,$mod_timein
			,$mod_timeout
			,$mod_days
			,$mod_weeks
			,$mod_status
			,$mod_notes
			);
			$stmt->execute();
			$numRecordsInserted = $stmt->affected_rows;
			$idUltimoRecord = $stmt->insert_id;
			echo "Numero de registros insertados: ". $numRecordsInserted . "<br /> ID del ultimo registro insertado: ". $idUltimoRecord;
			
			// UPDATE modulo_id COLUMN IN grupos TABLE
			$stmt = "UPDATE grupos SET grupo_actual_modulo_id = '$idUltimoRecord' WHERE grupo_id = '$group_id' LIMIT 1";
			if(!$sql = $db_conx->query($stmt)) {
				echo "Lo sentimos, UPDATE grupo_actual_modulo_id COLUMN IN grupos TABLE FAILED, estamos experimentando problemas, intentalo mas tarde.<br />";
				exit;
			}
			
			// UPDATE mod_nivel_id AND mod_cef_id COLUMNS IN modulos TABLE
			$stmt = "UPDATE modulos SET mod_nivel_id = '$modLevelId', mod_cef_id = '$modCefId' WHERE mod_id = '$idUltimoRecord'";
			if(!$sql = $db_conx->query($stmt)) {
				$addMod_msg = "Lo sentimos, UPDATE mod_nivel_id AND mod_ce_id COLUMNS IN modulos TABLE FAILED! estamos experimentando problemas, intentalo mas tarde.<br />";
				exit;
			}
			$addMod_msg = "Module created successfully!";
		} // END ELSE
	} 
	else {
		$addMod_msg = 'El formulario esta vacio';
		exit();
	}
	$addModJson = array("mensaje" => $addMod_msg);
	echo json_encode($addModJson);
?>