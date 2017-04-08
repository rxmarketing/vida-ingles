<?php

if (!empty($_POST)) {

    require_once '../classes/Database.php';

    $insertStud = new \dbconn\Database();

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
    $twitter = $_POST['twitter'];
    $skype = $_POST['skype'];
    $notes = $_POST['notas'];
    if ($school == "" || $group == "" || $pnombre == "" || $papellido == "" || $gender == "" || $country == "" || $state == "" || $muni == "" || $asent == "" || $zip == "") {
        echo '<span class="peligro">PHP: Llena campos obligatorios</span>';
    } else {
        $insertRow = $insertStud->insertRow("INSERT INTO estudiantes (escuela_id ,grupo_id
			,estud_matricula
			,estud_estatus_id
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
			,estud_tel
			,estud_dom1
			,estud_dom2
			,asent_id
			,muni_id
			,estado_id
			,estud_cp
			,pais_id
			,estud_notas
			,estud_twitter_username
			,estud_skype_username
			,fecha_creada
			) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())", [$school, $group, $cred, $status, $fechainicio, $pnombre, $snombre, $papellido, $sapellido, $gender, $dob, $mob, $yob, $email, $mobilef, $homef, $address1, $address2, $asent, $muni, $state, $zip, $country, $notes, $twitter, $skype]);
    }
} else {
    echo 'El formulario esta vacío.';
}
