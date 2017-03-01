<?php
	include('../inc/db_ceteci_conn.php');
	$group_id = null;
	if (!empty($_POST)) {
		$examDate = $_POST['examDate'];
		$examGrpId = $_POST['groupID'];
		$examModId = $_POST['grp_mod_id'];
		$examUnitId = $_POST['mod_unit_id'];
		$examPoints = $_POST['examPoints'];
		$examNotes = $_POST['examNotes'];
		
		if ($examDate == "" || $examGrpId == "" || $examPoints == "") {
			$addExam_msg = 'PHP: Los campos con asterisco son obligatorios.';
			$addExamJson = array("mensaje" => $addExam_msg);
			echo json_encode($addExamJson);
			exit;
			} else {
			$stmt = $db_conx->prepare("INSERT INTO examenes (
			exam_fecha
			,exam_grp_id
			,exam_mod_id
			,exam_mod_unidad_id
			,exam_reactivos
			,exam_notas
			,exam_fecha_creada
			,exam_fecha_modificacion
			) 
			VALUES (?,?,?,?,?,?,NOW(),NOW())");
			if(!$stmt){
				$addExam_msg = "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
                $addExam_msg .= "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
				$addExamJson = array("mensaje" => $addExam_msg);
				echo json_encode($addExamJson);
                exit;
			}
			$stmt->bind_param('sdddds'
			,$examDate
			,$examGrpId
			,$examModId
			,$examUnitId
			,$examPoints
			,$examNotes
			);
			$stmt->execute();
			$numRecordsInserted = $stmt->affected_rows;
            $idUltimoRecord = $stmt->insert_id;
            //echo "Numero de registros insertados: ". $numRecordsInserted . "<br /> ID del ultimo registro insertado: ". $idUltimoRecord;
			
			$addExam_msg = "Exam saved successfully!";
		} // END ELSE
	} 
	else {
		$addExam_msg = 'El formulario esta vacio';
		exit;
	}
	$addExamJson = array("mensaje" => $addExam_msg);
    echo json_encode($addExamJson);
?>