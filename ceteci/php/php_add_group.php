<?php
	include('../inc/db_ceteci_conn.php');
	if (!empty($_POST)) {
		$group_fecha_inicio = $_POST['fechaInicio'];
		$group_fecha_final = $_POST['fechaFinal'];
		$school_id = $_POST['schoolID'];
		$teacher_id = $_POST['teacher'];
		$group_code = $_POST['groupCode'];
		$group_cat_id = $_POST['grpCatId'];
		$grupo_timein	= $_POST['timein'];
		$grupo_timeout	= $_POST['timeout'];
		$group_notes = $_POST['groupNotes'];
		$grupo_days = implode(", ", $_POST['days']);
		$grupo_estatus_id = $_POST['groupStatusID'];
		if ($school_id == "" || $group_fecha_inicio == "" || $grupo_timein == "" || $grupo_timeout == "" || $teacher_id == "" || $group_notes == "" || $group_code == "" || $group_cat = "" || $grupo_estatus_id == "" || $grupo_days == "") {
			echo '<span class="peligro">PHP: Llena los campos obligatorios!</span>';
			exit();
			} else {
			$stmt = $db_conx->prepare("INSERT INTO grupos (
			escuela_id
			,grupo_cat_id
			,maes_id
			,grp_clave
			,grupo_fecha_inicio
			,grupo_fecha_final
			,grupo_timein
			,grupo_timeout
			,grupo_dias
			,grupo_estatus_id
			,grupo_notas
			,grp_fecha_creada
			,grp_fecha_modificacion
			) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())
			");
			if(!$stmt){
				echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
				echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
				exit;
			}
			$stmt->bind_param('dddssssssds'
			,$school_id
			,$group_cat_id
			,$teacher_id
			,$group_code
			,$group_fecha_inicio
			,$group_fecha_final
			,$grupo_timein
			,$grupo_timeout
			,$grupo_days
			,$grupo_estatus_id
			,$group_notes
			);
			$stmt->execute();
			$numRecordsInserted = $stmt->affected_rows;
			$idUltimoRecord = $stmt->insert_id;
			echo "Numero de registros insertados: ". $numRecordsInserted . "<br /> ID del ultimo registro insertado: ". $idUltimoRecord;
		} 
		} else {
		echo 'Formulario vacio. Completalo';
		exit;
	}
?>