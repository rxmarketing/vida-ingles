<?php 
	include('../../inc/db_vidainglescore_conn.php');
	
	$stmt = $db_conx->prepare("INSERT INTO estudiantes (
	escuela_id
	,grupo_id
	,estud_matricula
	,estud_status_id
	,estud_fecha_inicio
	,estud_fecha_final
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
	,estud_fecha_modificacion
	) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),CURRENT_TIMESTAMP)");
	if(!$stmt){
		echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
		echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
		exit; 
	}
	$stmt->bind_param('ddsdssssssddddsssssdddsssssssss'
	,$_POST["s_escuela"], 
	$_POST["s_grupo"],
	$_POST["s_matricula"],
	$_POST["s_status"],
	$_POST["s_fechainicio"],
	$_POST["s_fechafinal"],
	$_POST["p_nombre"], 
	$_POST["s_nombre"], 
	$_POST["p_apellido"], 
	$_POST["s_apellido"], 
	$_POST["s_genero"], 
	$_POST["s_ddn"], 
	$_POST["s_mdn"], 
	$_POST["s_adn"],
	$_POST["s_email"],
	$_POST["s_mobile"],
	$_POST["s_phone"],
	$_POST["s_dom1"],
	$_POST["s_dom2"],
	$_POST["s_asent"],
	$_POST["s_muni"],
	$_POST["s_estado"],
	$_POST["s_cp"],
	$_POST["s_pais"],
	$_POST["s_notas"],
	$_POST["s_fb"],
	$_POST["s_twitter"],
	$_POST["s_youtube"],
	$_POST["s_skype"],
	$_POST["s_cyberh_id"],
	$_POST["s_cyberh_pass"]
	);
	$stmt->execute();
	$numRecordsInserted = $stmt->affected_rows;
	if($numRecordsInserted > 0) {
		echo "Data inserted successfully!";
	}
	else
	{
		echo "something went wrong.";
	}
?>