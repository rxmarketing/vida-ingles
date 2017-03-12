<?php
	include('../inc/db_ceteci_conn.php');
	$stud_msg = "";
	if(!empty($_POST)){
		$fechainicio = $_POST['fechaInicio'];
		$school = $_POST['schoolID'];
		$cred = $_POST['cred'];
		$group = $_POST['groupID'];
		$status = $_POST['studStatusID'];
		$cyberID = $_POST['cyberhID'];
		$cyberPass = $_POST['cyberhPass'];
		$pnombre = $_POST['studPNombre'];
		$snombre = $_POST['studSNombre'];
		$papellido = $_POST['studPApellido'];
		$sapellido = $_POST['studSApellido'];
		$dob = $_POST['dob'];
		$mob = $_POST['mob'];
		$yob = $_POST['yob'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$mobilef = $_POST['mobilef'];
		$homef = $_POST['homef'];
		$address1 = $_POST['address'];
		$address2 = $_POST['address2'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$muni = $_POST['muni'];
		$asent = $_POST['asentamiento'];
		$zip = $_POST['zip'];
		//$fbID = $_POST['fbid'];
		$twitter = $_POST['twitter'];
		$skype = $_POST['skype'];
		$notes = $_POST['notas'];
		if ($school == "" || $group == "" || $pnombre == "" || $papellido == "" || $gender == "" || $country == "" || $state == "" || $muni == "" || $asent == "" || $zip == "") {
			echo '<span class="peligro">PHP: Llena campos obligatorios</span>';
			} else {
			$stmt = $db_conx->prepare("INSERT INTO estudiantes (
			escuela_id
			,grupo_id
			,estud_matricula
			,estud_status_id
			,estud_fecha_inicio
			,estud_pnombre
			,estud_snombre
			,estud_papellido
			,estud_sapellido
			,genero_id
			,estud_ddn
			,estud_mdn
			,estud_adn
			,estud_email
			,estud_celular
			,estud_telefono
			,estud_domicilio1
			,estud_domicilio2
			,asentamiento_id
			,muni_id
			,estado_id
			,estud_cp
			,pais_id
			,estud_notas
			,estud_fb_id
			,estud_twitter
			,estud_youtube
			,estud_skype
			,estud_cyberh_id
			,estud_cyberh_pass
			,estud_fecha_creada
			) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");
			if(!$stmt){
				echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
				echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
				exit; 
			}
			$stmt->bind_param('ddsdsssssddddsssssdddsssssssss'
			,$school
			,$group
			,$cred
			,$status
			,$fechainicio
			,$pnombre
			,$snombre
			,$papellido
			,$sapellido
			,$gender
			,$dob
			,$mob
			,$yob
			,$email
			,$mobilef
			,$homef
			,$address1
			,$address2
			,$asent
			,$muni
			,$state
			,$zip
			,$country
			,$notas
			,$fbID
			,$twitter
			,$youtube
			,$skype
			,$cyberID
			,$cyberPass
			);
			$stmt->execute();
			$numRecordsInserted = $stmt->affected_rows;
			$idUltimoRecord = $stmt->insert_id;
			echo "Numero de registros insertados: ". $numRecordsInserted . "<br /> ID del ultimo registro insertado: ". $idUltimoRecord;
		}
	}
	else {
		echo 'El formulario esta vacio';
	}
	//$studJson = array("mensaje" => $stud_msg);
	//echo json_encode($studJson);
?>                    