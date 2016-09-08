<?php
include_once("../inc/checar_sesion.php");
if($user_ok == true) {
	include_once("../inc/db_vidainglescore_conn.php");

		
	$ejerid = preg_replace('#[^0-9]#','',$_POST['ejerid']);
	$input_q1 = mysqli_real_escape_string($db_conx,$_POST['inputq1']);
	$input_q2 = mysqli_real_escape_string($db_conx,$_POST['inputq2']);
	$input_q3 = mysqli_real_escape_string($db_conx,$_POST['inputq3']);
	$input_q4 = mysqli_real_escape_string($db_conx,$_POST['inputq4']);
	$input_q5 = mysqli_real_escape_string($db_conx,$_POST['inputq5']);
	$input_q6 = mysqli_real_escape_string($db_conx,$_POST['inputq6']);
	$input_q7 = mysqli_real_escape_string($db_conx,$_POST['inputq7']);
	$input_q8 = mysqli_real_escape_string($db_conx,$_POST['inputq8']);
	$input_q9 = mysqli_real_escape_string($db_conx,$_POST['inputq9']);
 $input_q10 = mysqli_real_escape_string($db_conx,$_POST['inputq10']);
 $input_q11 = mysqli_real_escape_string($db_conx,$_POST['inputq11']);
 $input_q12 = mysqli_real_escape_string($db_conx,$_POST['inputq12']);
 $input_q13 = mysqli_real_escape_string($db_conx,$_POST['inputq13']);
 $input_q14 = mysqli_real_escape_string($db_conx,$_POST['inputq14']);
 $input_q15 = mysqli_real_escape_string($db_conx,$_POST['inputq15']);
 $input_q16 = mysqli_real_escape_string($db_conx,$_POST['inputq16']);
 $input_q17 = mysqli_real_escape_string($db_conx,$_POST['inputq17']);
 $input_q18 = mysqli_real_escape_string($db_conx,$_POST['inputq18']);
 $input_q19 = mysqli_real_escape_string($db_conx,$_POST['inputq19']);
 $input_q20 = mysqli_real_escape_string($db_conx,$_POST['inputq20']);
 $input_q21 = mysqli_real_escape_string($db_conx,$_POST['inputq21']);
 $input_q22 = mysqli_real_escape_string($db_conx,$_POST['inputq22']);
 $input_q23 = mysqli_real_escape_string($db_conx,$_POST['inputq23']);
 $input_q24 = mysqli_real_escape_string($db_conx,$_POST['inputq24']);
 $input_q25 = mysqli_real_escape_string($db_conx,$_POST['inputq25']);
 $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

	if($input_q1 == "" || $input_q2 == "" || $input_q3 == "" || $input_q4 == "" || $input_q5 == "" || $input_q6 == "" || $input_q7 == "" || $input_q8 == "" || $input_q9 == "" || $input_q10 == "") {
		$mensaje = "Debessssss completar el ejercicio";
		//exit();
	} else {
	// INSERT USER INPUT INTO exam_results TABLE
		$sql = "INSERT INTO resultados_ejercicios_app (
						result_id
						,ejer_id
						,userid
						,user_answer1
						,user_answer2
						,user_answer3
						,user_answer4
						,user_answer5
						,user_answer6
						,user_answer7
						,user_answer8
						,user_answer9
						,user_answer10
						,user_answer11
						,user_answer12
						,user_answer13
						,user_answer14
						,user_answer15
						,user_answer16
						,user_answer17
						,user_answer18
						,user_answer19
						,user_answer20
						,user_answer21
						,user_answer22
						,user_answer23
						,user_answer24
						,user_answer25
						,ip
						,grade
						,datetaken
						,datemodified
						)
						VALUES (
						NULL
						,'$ejerid'
						,'$log_id'
						,'$input_q1'
						,'$input_q2'
						,'$input_q3'
						,'$input_q4'
						,'$input_q5'
						,'$input_q6'
						,'$input_q7'
						,'$input_q8'
						,'$input_q9'
						,'$input_q10'
						,'$input_q11'
						,'$input_q12'
						,'$input_q13'
						,'$input_q14'
						,'$input_q15'
						,'$input_q16'
						,'$input_q17'
						,'$input_q18'
						,'$input_q19'
						,'$input_q20'
						,'$input_q21'
						,'$input_q22'
						,'$input_q23'
						,'$input_q24'
						,'$input_q25'
						,'$ip'
						,'0'
						,now()
						,NOW()
						)";
		$qry = mysqli_query($db_conx,$sql);
		
		if (!$qry) {
		$mensaje = '<small><span class="bg-danger text-danger">Error enviando mensaje: <br />' . mysqli_error($db_conx).'</span></small>';
	} else {
		$mensaje = "Resultados guardados";
	}
		
		
		//exit();
	} 
	//else {
//	$usql = "UPDATE exam_results SET
//						exam_id = '$exaid'
//						,userid = '$log_id'
//						,user_answer1 = '$input_q1'
//						,user_answer2 = '$input_q2'
//						,user_answer3 = '$input_q3'
//						,user_answer4 = '$input_q4'
//						,user_answer5 = '$input_q5'
//						,user_answer6 = '$input_q6'
//						,user_answer7 = '$input_q7'
//						,user_answer8 = '$input_q8'
//						,user_answer9 = '$input_q9'
//						,user_answer10 = '$input_q10'
//						,datetaken = now() LIMIT 1";
//		$uquery = mysqli_query($db_conx,$usql);
//		$mensaje = "Resultados actualizdos.";
//	}
	//exit();
} else {
	$mensaje = 'PHP: Debes iniciar sesi&oacute;n para guardar tus resultados. <a href="http://localhost/vidaingles/iniciar">Iniciar sesion</a>&nbsp; <a href="http://localhost/vidaingles/registrar">Registrate</a>';
}
 $vjson = array("mensaje" => $mensaje,);
echo json_encode($vjson);
?>
