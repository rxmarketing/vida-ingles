<?php
	include('../inc/db_ceteci_conn.php');
	$group_id = null;
	if (!empty($_POST)) {
		$mod_scl_id = $_POST['mod_scl_id'];
		$mod_cat_id = $_POST['mod_cat_id'];
		$mod_name_id = $_POST['modNameId'];
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
		$stmt = "SELECT modulo_id FROM grupos WHERE grp_id = '$group_id' AND grupo_estatus_id = '5' LIMIT 1";
		if(!$sql = $db_conx->query($stmt)) {
			$addMod_msg = "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
			$addMod_msg .= "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			$addModJson = array("mensaje" => $addMod_msg);
			echo json_encode($addModJson);
			exit;
		}
		while($row = $sql->fetch_assoc()){
			$grpModId = $row['modulo_id'];
		}
		//$group_check = $sql->num_rows;
		//echo $group_id . '<br />';
		//echo $grpModId;
		if ($mod_cat_id == "" || $mod_name_id == "" || $mod_days == "" || $mod_start_date == "" || $mod_end_date == "" || $group_id == "" || $mod_weeks == "" || $mod_notes == "" || $mod_status == "" || $mod_timein == "" || $mod_timeout == "") {
			$addMod_msg = 'PHP: Todos los campos son obligatorios.';
			$addModJson = array("mensaje" => $addMod_msg);
			echo json_encode($addModJson);
			exit;
			} else if(!$grpModId == 0){
			echo 'PHP: Este grupo ya tiene modulo asignado. Elige otro o crea uno nuevo.';
			
			exit;
			} else {
			$stmt = $db_conx->prepare("INSERT INTO modulos (
			mod_escuela_id
			,mod_cat_id
			,mod_nombre_id
			,mod_grupo_id
			,mod_fecha_inicio
			,mod_fecha_final
			,mod_hora_inicio
			,mod_hora_final
			,mod_dias
			,mod_num_semanas
			,mod_estatus_id
			,mod_notas
			,mod_fecha_creada
			,mod_fecha_modificada
			) 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())");
			if(!$stmt){
				$addMod_msg = "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
                $addMod_msg .= "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
				$addModJson = array("mensaje" => $addMod_msg);
				echo json_encode($addModJson);
                exit;
			}
			$stmt->bind_param('ddddsssssdds'
			,$mod_scl_id
			,$mod_cat_id
			,$mod_name_id
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
            //echo "Numero de registros insertados: ". $numRecordsInserted . "<br /> ID del ultimo registro insertado: ". $idUltimoRecord;
			// UPDATE modulo_id COLUMN IN grupos TABLE
			$stmt = "UPDATE grupos SET modulo_id = '$idUltimoRecord' WHERE grp_id = '$group_id' LIMIT 1";
			if(!$sql = $db_conx->query($stmt)) {
				echo "Lo sentimos, UPDATE modulo_id COLUMN FAILED, estamos experimentando problemas, intentalo mas tarde.<br />";
				exit;
			}
			
			// FETCH mod_nombre_id OF THE LAST RECORD INSERTED ABOVE FROM modulos TABLE
			$stmt = "SELECT mod_nombre_id FROM modulos WHERE mod_id = '$idUltimoRecord' LIMIT 1";
			if(!$sql = $db_conx->query($stmt)) {
				echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
				exit;
			} 
			while($row = $sql->fetch_assoc()){
				$modNameId = $row['mod_nombre_id'];
				//echo 'MODULE NAME ID: '.$modNameId;
			}
			// FETCH mod_cef_id AND mod_level_id OF THE mod_nombre_id ABOVE FROM module_names TABLE
			$stmt = "SELECT mod_cef_id, mod_level_id FROM module_names WHERE mod_subcat_id = '$modNameId' LIMIT 1";
			if(!$sql = $db_conx->query($stmt)) {
				echo "Lo sentimos, EEestamos experimentando problemas, intentalo mas tarde.<br />";
				exit;
			} 
			while($row = $sql->fetch_assoc()){
				$modCefId = $row['mod_cef_id'];
				$modLevelId = $row['mod_level_id'];
				//echo 'MODULE CEF ID: '.$modCefId. ' MODULE LEVEL ID: '.$modLevelId;
			}
			// UPDATE mod_description_id AND cef_id COLUMNS IN modulos TABLE
			$stmt = "UPDATE modulos SET mod_descripcion_id = '$modLevelId', cef_id = '$modCefId' WHERE mod_id = '$idUltimoRecord'";
			if(!$sql = $db_conx->query($stmt)) {
				$addMod_msg = "Lo sentimos, UPDATE failed, estamos experimentando problemas, intentalo mas tarde.<br />";
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