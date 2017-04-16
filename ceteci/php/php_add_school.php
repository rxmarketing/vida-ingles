<?php
include('../inc/db_cetec_mysqliconn.php');

if(!empty($_POST)){
	$sclName = $_POST['school_name'];
	$sclRFC = $_POST['rfc'];
	$sclAdrress1 = $_POST['address'];
	$sclAdrress2 = $_POST['address2'];
	$sclCountry = $_POST['country'];
	$sclState = $_POST['state'];
	$sclMuni = $_POST['muni'];
	$sclAsentamiento = $_POST['asentamiento'];
	$sclZip = $_POST['zip'];
	$sclEmail = $_POST['email'];
	$sclMobile = $_POST['mobilef'];
	$sclPhone = $_POST['homef'];
	$sclWebsite = $_POST['website'];
	$sclNotes = $_POST['scl_notes'];
	
	//CHECK FOR EMPTY REQUIRED FIELDS
	if($sclName == "" || $sclAdrress1 == "" || $sclAdrress2 == "" || $sclCountry == "" || $sclState == "" || $sclMuni == "" || $sclAsentamiento == "" || $sclZip == "" || $sclPhone == ""){
		echo "PHP: Llena los campos obligatorios.";
	} else {
		$stmt = $db_conx->prepare("INSERT INTO schools (
		scl_name
		,scl_address1
		,scl_address2
		,country_id
		,state_id
		,muni_id
		,asent_id
		,zip
		,scl_email
		,scl_phone
		,scl_mobile
		,scl_website
		,scl_rfc
		,scl_notas
		,scl_datecreated
		,scl_datemodified
		) VALUES 
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())");
		if(!$stmt){
			echo "Lo sentimos, estamos experimentando problemas, intentalo mas tarde.<br />";
            echo "Fallo la preparacion (" . $db_conx->errno . ") " . $db_conx->error;
			exit; 
		}
		$stmt->bind_param(
		'sssddddsssssss'
		,$sclName
		,$sclAdrress1
		,$sclAdrress2
		,$sclCountry
		,$sclState
		,$sclMuni
		,$sclAsentamiento
		,$sclZip
		,$sclEmail
		,$sclPhone
		,$sclMobile
		,$sclWebsite
		,$sclRFC
		,$sclNotes
		);
		$stmt->execute();
		$numRecordsInserted = $stmt->affected_rows;
		$idUltimoRecord = $stmt->insert_id;
		echo "Numero de registros insertados: ". $numRecordsInserted . "<br /> ID del ultimo registro insertado: ". $idUltimoRecord;
	}
} else {
	echo 'El formulario esta vacio';
}

?>